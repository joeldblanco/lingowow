Echo.private('App.Models.User.' + window.user_id)
    .notification((notification) => {

        if (notification.type == "App\\Notifications\\NewMessage") {
            // console.log(notification);
            unread_messages = document.getElementById('unread_messages');
            unread_messages.innerHTML = notification.unread_messages;
            unread_messages.style.display = "inline-flex";

            last_message = document.getElementById('last_message');
            last_message.innerHTML = notification.text_message;

            conversation = document.getElementById('conversation_' + notification.conversation_id);
            conversation.classList.add('font-bold');

            unread_conversation = document.getElementById('unread_conversation_' + notification.conversation_id);
            unread_conversation.style.display = "inline-flex";
        }

    });