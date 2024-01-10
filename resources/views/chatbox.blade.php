<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Chatbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .hidden {
            display: none;
        }

        #chatbox {
            width: 300px;
            position: fixed;
            bottom: 10px;
            right: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }

        #messages {
            max-height: 200px;
            overflow-y: scroll;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        #messageInput {
            width: 70%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        #sendBtn {
            padding: 5px 10px;
            background-color: #00cc66;
            border: none;
            color: #fff;
        }

    </style>
</head>
<body>
    <button id="openChatBtn">Chat</button>
    <div id="chatbox" class="hidden">
        <div id="messages"></div>
        <input type="text" id="messageInput" placeholder="Type your message...">
        <button id="sendBtn">Send</button>
    </div>
    <script src="script.js"></script>
</body>
<script>
    const openChatBtn = document.getElementById('openChatBtn');
    const chatbox = document.getElementById('chatbox');
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');

    let isOpen = false;

    openChatBtn.addEventListener('click', () => {
        isOpen = !isOpen;
        chatbox.classList.toggle('hidden', !isOpen);
        if (isOpen) {
            messageInput.focus();
        }
    });

    sendBtn.addEventListener('click', () => {
        const message = messageInput.value.trim();
        if (message !== '') {
            const messageElement = document.createElement('div');
            messageElement.textContent = message;
            messagesDiv.appendChild(messageElement);
            messageInput.value = '';
            messageInput.focus();
        }
    });

</script>
</html>
