<?php

namespace App\Services;

use App\Models\Course;
use Goutte\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class PlanningService {

    private $galaoService;

    public function __construct()
    {
        $this->galaoService = new GalaoService();
    }

    private function getFromGalao() : array
    {
        $crawler = $this->galaoService->getPlanningCrawler();

        //$crawler = new Crawler(FakeProvider::getPlanning());

        //@TODO -> Try catch ici

        $selector = 'table.cadre_P127C>tr.cadre_P127C>td>table.cadre_P127C>tr';
        $days = $crawler->filter($selector)->each(function ($node) {

            $date = $node->children()->first()->text();

            $selector = 'td.cadre_P127C>table>tr>td>font.txtmaple9';
            $courses = $node->filter($selector)->each(function ($node) {

                $attributes = explode('<br>', $node->html());

                foreach ($attributes as $key=>$attribute) {
                    $attributes[$key] = strip_tags($attribute);
                    if(Str::endsWith($attributes[$key], ' : ')) {
                        $attributes[$key] = Str::replace(' : ', '', $attributes[$key]);
                    }
                }

                $attrCount = count($attributes);

                if($attrCount === 6 || $attrCount === 7) {
                    return [
                        'start' => str_replace('h', ':', explode(' - ', $attributes[0])[0]),
                        'end' => str_replace('h', ':', explode(' - ', $attributes[0])[1]),
                        'code' => $attributes[1],
                        'content' => $attributes[2],
                        'professor' => $attributes[3],
                        'is_exam' => $attributes[4] === 'EXAMEN',
                        'room' => $attributes[5],
                    ];
                }

                if($attrCount === 5) {
                    return [
                        'start' => str_replace('h', ':', explode(' - ', $attributes[0])[0]),
                        'end' => str_replace('h', ':', explode(' - ', $attributes[0])[1]),
                        'code' => $attributes[1],
                        'content' => $attributes[2],
                        'professor' => $attributes[3],
                        'is_exam' => $attributes[4] === 'EXAMEN',
                        'room' => null,
                    ];
                }

                if($attrCount === 4) {
                    return [
                        'start' => str_replace('h', ':', explode(' - ', $attributes[0])[0]),
                        'end' => str_replace('h', ':', explode(' - ', $attributes[0])[1]),
                        'code' => null,
                        'content' => $attributes[2],
                        'professor' => '',
                        'is_exam' => $attributes[1] === 'EXAMEN',
                        'room' => null,
                    ];
                }

                if($attrCount === 3) {
                    return [
                        'start' => str_replace('h', ':', explode(' - ', $attributes[0])[0]),
                        'end' => str_replace('h', ':', explode(' - ', $attributes[0])[1]),
                        'code' => null,
                        'content' => $attributes[1],
                        'professor' => $attributes[2],
                        'is_exam' => false,
                        'room' => null,
                    ];
                }
            });

            return [
                'date' => $date,
                'courses' => $courses,
            ];

        });

        return $days;
    }

    public function synchronize(): void
    {
        $days = $this->getFromGalao();

        foreach ($days as $key=>$day) {

            $date = Carbon::parse(self::translateDate($day['date']))->toDateString();

            $oldCourses = Course::query()
                ->where('date', '=', $date)
                ->get();

            Course::query()
                ->where('date', '=', $date)
                ->delete();


            foreach ($day['courses'] as $course) {

                if($course === null) {
                    continue;
                }

                $courseDB = new Course();
                $courseDB->code = $course['code'] ?? 'AUTRE';
                $courseDB->desc = $course['content'];
                $courseDB->professor = $course['professor'];
                $courseDB->room = $course['room'];
                $courseDB->is_exam = $course['is_exam'];
                $courseDB->start = $course['start'];
                $courseDB->end = $course['end'];
                $courseDB->date = $date;
                $courseDB->save();
            }
        }
    }

    public function getCoursesByDate($date)
    {
        return Course::query()
            ->where('date', '=', $date)
            ->get();
    }

    private static function filterByDay($galaoCourses): array
    {
        $days = [];

        foreach ($galaoCourses as $galaoCourse) {
            $translatedDate = self::translateDate($galaoCourse['date']);
            $courseDate = Carbon::parse($translatedDate)->toDateString();

            if(!isset($days[$courseDate])) {
                $days[$courseDate] = [];
            }

            $days[$courseDate][] = $galaoCourse;
        }

        return $days;
    }

    private static function translateDate($date)
    {
        $frenchDays = [ 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche' ];
        $englishDays = [ 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' ];

        $frenchMonths = [ 'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juiller', 'aout', 'septembre', 'octobre', 'novembre', 'décembre' ];
        $englishMonths = [ 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' ];

        $frenchOther = [ '1er' ];
        $englishOther = [ '1st' ];

        return str_replace(
            array_merge($frenchDays, $frenchMonths, $frenchOther),
            array_merge($englishDays, $englishMonths, $englishOther),
            $date
        );
    }


}
