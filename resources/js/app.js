require('./bootstrap');

try {
    const beamsClient = new PusherPushNotifications.Client({
        instanceId: 'dbf914d6-1939-480f-bf92-5440ede9f984',
    });

    beamsClient.start()
        .then(() => beamsClient.addDeviceInterest('hello'))
        .then(() => console.log('Successfully registered and subscribed!'))
        .catch(console.error);

} catch (e) {
    console.log('Notifications are not enabled on this device');
}

let initNotificationsClient = () => {

    const beamsClient = new PusherPushNotifications.Client({
        instanceId: 'dbf914d6-1939-480f-bf92-5440ede9f984',
    });

    beamsClient.start().then(() => {
        console.log(beamsClient.getDeviceInterests());
        console.log(beamsClient.getRegistrationState());
    });

    let subscribeToInterest = (label) => {

    }

    let unsubscribeFromInterest = (label) => {

    }
}

initNotificationsClient();
