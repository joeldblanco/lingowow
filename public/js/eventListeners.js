Echo.private('App.Models.User.' + window.user_id).notification((notification) => {

    if (notification.type == "App\\Notifications\\NewMessage") {

        unread_messages = document.getElementById('unread_messages');
        unread_messages.style.display = "inline-flex";

        last_message = document.getElementById('last_message');
        last_message.innerHTML = notification.text_message;

        conversation = document.getElementById('conversation_' + notification.conversation_id);
        conversation.classList.add('font-bold');

        unread_conversation = document.getElementById('unread_conversation_' + notification.conversation_id);
        unread_conversation.style.display = "inline-flex";
    }

    if ((notification.type == "App\\Notifications\\BookedClass") || (notification.type == "App\\Notifications\\ClassRescheduledToTeacher") || (notification.type == "App\\Notifications\\ClassRescheduledToStudent") || (notification.type == "App\\Notifications\\StudentUnrolment") || (notification.type == "App\\Notifications\\StudentUnrolmentToTeacher") || (notification.type == "App\\Notifications\\FriendRequest")) {

        unread_notifications = document.getElementById('unread_notifications');
        unread_notifications.style.display = "inline-flex";

        // waitForElementToExist(notification.id, (element) => {
        //     element.classList.add('font-bold');
        // });

        new_notification = document.getElementById(notification.id);
        new_notification.classList.add('font-bold');

        unread_notification = document.getElementById('unread_notification_' + notification.id);
        unread_notification.style.display = "inline-flex";

        // waitForElementToExist('unread_notification_' + notification.id, (element) => {
        //     // unread_notification = document.getElementById('unread_notification_' + notification.id);
        //     element.style.display = "inline-flex";
        // });

    }

    // function waitForElementToExist(selector, callback) {
    //     const element = document.getElementById(selector);
    //     if (element) {
    //         callback(element);
    //     } else {
    //         setTimeout(() => waitForElementToExist(selector, callback), 100); // Revisa cada 100ms hasta encontrar el elemento
    //     }
    // }

});