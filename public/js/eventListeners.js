Echo.private('App.Models.User.' + window.user_id).notification((notification) => {

    if (notification.type == "App\\Notifications\\NewMessage") {
        console.log(notification);
        unread_messages = document.getElementById('unread_messages');
        // unread_messages.innerHTML = notification.unread_messages;
        unread_messages.style.display = "inline-flex";
        unread_messages.classList.remove("hidden");

        last_message = document.getElementById('last_message');
        last_message.innerHTML = notification.text_message;

        conversation = document.getElementById('conversation_' + notification.conversation_id);
        conversation.classList.add('font-bold');

        unread_conversation = document.getElementById('unread_conversation_' + notification.conversation_id);
        unread_conversation.style.display = "inline-flex";
        unread_conversation.classList.remove("hidden");
    }

    if ((notification.type == "App\\Notifications\\BookedClass") || (notification.type == "App\\Notifications\\ClassRescheduledToTeacher") || (notification.type == "App\\Notifications\\ClassRescheduledToStudent") || (notification.type == "App\\Notifications\\StudentUnrolment") || (notification.type == "App\\Notifications\\StudentUnrolmentToTeacher") || (notification.type == "App\\Notifications\\FriendRequest")) {
        // console.log(notification);
        unread_notifications = document.getElementById('unread_notifications');
        // unread_notifications.innerHTML = notification.unread_notifications;
        unread_notifications.style.display = "inline-flex";

        notification = document.getElementById(notification.id);
        notification.classList.add('font-bold');

        unread_notification = document.getElementById('unread_notification_' + notification.id);
        unread_notification.style.display = "inline-flex";
    }

});