<!DOCTYPE html>
<html >
     

 
        <head>
            

        
            <script>
                const peopleId = "{{ $user->id }}";
                window.sessionUserIdentifier = "{{ session('user_identifier') }}";
                window.peopleId = "{{ $user->id }}";
                console.log("{{$user->id}}");
            </script>
            <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

            <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                user-select: none;
            }

            body {
                box-sizing: border-box;
                background: #FFF;
                font-family: 'Noto Sans JP', -apple-system, BlinkMacSystemFont, "Helvetica Neue", YuGothic, "ヒラギノ角ゴ ProN W3", Hiragino Kaku Gothic ProN, Arial, "メイリオ", Meiryo, sans-serif;
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                tap-highlight-color: rgba(0, 0, 0, 0);
                overflow-x: hidden;
            }

            a {
                color: #2196F3;
                text-decoration: none;
            }

            h2 {
                font-family: Arial, sans-serif;
                font-size: 20px;
            }

            #chatbot {
                position: fixed;
                overflow: hidden;
                opacity: 1;
                transition: .4s;
                background: #FFF;
                -webkit-font-smoothing: none;
                -webkit-font-smoothing: antialiased;
                -webkit-font-smoothing: subpixel-antialiased;
            }

            @media screen and (min-width: 700px) {
                #chatbot {
                    height: 80vh;
                    width: 100%;
                    bottom: 0;
                    right: 0;
                    margin: 0;
                    box-shadow: 0px 0 25px -5px #888;
                    border-radius: 10px;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    -webkit-transform: translate(-50%, -50%);
                    -moz-transform: translate(-50%, -50%);
                }
            }

            @media screen and (max-width: 700px) {
                #chatbot {
                    height: 100vh;
                    width: 100vw;
                }
            }


            #chatbot-body {
                width: 100%;
                height: calc(100vh - 110px);
                padding-top: 10px;
                background: #FFF;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: scroll;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: none;
            }

            @media screen and (max-width: 700px) {
                #chatbot-body {
                    height: calc(100vh - 60px);
                }
            }

            #chatbot-body.chatbot-body-zoom {
                width: 100%;
            }

            #chatbot-body.chatbot-body-zoom {
                height: calc(100vh - 60px);
            }

            #chatbot-body::-webkit-scrollbar {
                display: none;
            }

            #chatbot-footer {
                width: 100%;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                box-sizing: border-box;
                background: #FFF;
                border-top: 1.5px solid #EEE;
                position: fixed;
                bottom: 0;
                left: 0;
                padding: 10px;
            }

            @media screen and (min-width: 700px) {
                #chatbot-footer {
                    width: 100%;
                    margin: 0 auto;
                }
            }

            @media screen and (min-width: 700px) {
                #chatbot-footer.chatbot-footer-zoom {
                    margin-bottom: 0;
                }
            }

            @media screen and (max-width: 700px) {
                #chatbot-footer.chatbot-footer-zoom {
                    position: fixed;
                    margin-bottom: 0;
                }
            }

            #chatbot-text {
                height: 40px;
                width: 70%;
                display: block;
                font-size: 16px;
                box-sizing: border-box;
                padding-left: 10px;
                margin: auto 10px auto 15px;
                color: #777;
                border: 0;
                outline: 0;
            }

            #chatbot-text:focus {
                border: none;
                outline: none;
            }

            #chatbot-submit {
                cursor: pointer;
                height: 35px;
                padding: 0 20px;
                margin-left: 10px;
                margin-right: 15px;
                font-size: 16px;
                background: #335C80;
                color: white;
                display: block;
                border: none;
                box-sizing: border-box;
                border-radius: 7px;
            }

            #chatbot-submit:active {
                outline: 0;
                background: #86ABBF;
            }

            #chatbot-ul {
                padding: 0;
                list-style: none;
            }

            @media screen and (min-width: 700px) {
                #chatbot-ul {
                    max-width: 80%;
                    margin: 15%;
                }
            }

            #chatbot-ul > li {
                position: relative;
                width: 100%;
                padding-bottom: 10px;
                word-wrap: break-word;
                display: flex;
            }

            .self {
                justify-content: flex-end;
            }

            .other {
                justify-content: flex-start;
            }

            .message-container {
                overflow-wrap: break-word;
                max-width: 70%;
                margin: 0.5rem 1rem;
                padding: 0.5rem;
                font-size: 1.125rem;
                font-weight: bold;
                border-radius: 0.5rem;
                display: inline-block;
            }

            .self-message {
                background-color: #c3e1ff;
                color: #1a202c;
                border-color: #4299e1;
                text-align: left;
            }

            .other-message {
                background-color: #b2f5ea;
                color: #1a202c;
                border-color: #000;
                text-align: left;
            }

            .text-right {
                text-align: right;
            }

            .text-left {
                text-align: left;
            }

            .text-sm {
                font-size: 0.7rem;
            }

            .font-normal {
                font-weight: normal;
            }

        </style>

    </head>
    <body id="chatbody" class="font-sans antialiased" style="margin-bottom: 60px;">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div id="chatbot">
            <div class="flex flex-col items-center">
                <form action="{{ url('people' ) }}" method="POST" class="w-full max-w-lg">
                    @method('PATCH')
                    @csrf
                    <div class="flex items-center justify-center text-center">
                        <h2 class="text-center">{{$user->name}}</h2> 
 
                    </div>
                </form>
            </div>

            <div id="chatbot-body">
                <ul id="chatbot-ul">
                @foreach ($chats as $chat)
                    <li class="{{ $chat->useridentifier == $user->id ? 'self' : 'other' }}">
                        <div class="message-container {{ $chat->useridentifier == $user->id ? 'self-message' : 'other-message' }}">
                            <div style="overflow-wrap: break-word;">
                                <p style="overflow-wrap: break-word;" class="text-gray-900">{{ $chat->message }}</p>
                                
                            </div>
                            <p class="text-sm font-normal {{ $chat->useridentifier == $user->id ? 'text-right' : 'text-left' }}">
                                {{ $chat->created_at }} ＠{{ $chat->username }}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <form  id="chat-form" action="{{ url('chat/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="items-center" id="chatbot-footer">
                    <input type="hidden" name="user_identifier" value="{{$user->id}}">
                    <input class="hidden py-1 px-2 rounded text-center mb-2 md:mb-0 md:mr-2 md:ml-0 md:flex-initial" type="text"
                           name="user_name" placeholder="UserName" maxlength="20" value="{{$user->name}}" required>
                   
                    <input type="text" id="chatbot-text" class="browser-default" name="message" placeholder="message" required
                           style="word-wrap: break-word;" data-user-identifier="{{$user->id}}">
                    <button type="submit" id="chatbot-submit">send</button>
                </div>
            </form>
        </div>

        <script>
           

            function chatToBottom() {
                const chatField = document.getElementById('chatbot-body');
                chatField.scrollTop = chatField.scrollHeight;
            }

            document.addEventListener('DOMContentLoaded', (event) => {
                chatToBottom();
                const user_Identifier1 = document.getElementById('chatbot-text').getAttribute('data-user-identifier');
 

                window.displayMessage = function(message, useridentifier, username, createdat) {
                    const chatUl = document.getElementById('chatbot-ul');
                    const li = document.createElement('li');
                    const className = useridentifier == user_Identifier1 ? 'self' : 'other';
                    li.classList.add(className);
                    li.innerHTML = `
                        <div class="message-container ${className === 'self' ? 'self-message' : 'other-message'}">
                            <div style="overflow-wrap: break-word;">
                                <p style="overflow-wrap: break-word;" class="text-gray-900">${message}</p>
                                 
                            </div>
                            <p class="text-sm font-normal ${className === 'self' ? 'text-right' : 'text-left'}">
                                ${createdat} ＠${username}
                            </p>
                        </div>
                    `;
                    chatUl.appendChild(li);
                    chatToBottom();
                };

                document.getElementById('chat-form').addEventListener('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    fetch(this.action, {
                        method: 'POST',
                        body: formData
                    }).then(response => {
                        console.log('Response:', response);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data:', data);
                      window.displayMessage(data.message, data.useridentifier, data.username, data.createdat);
                       document.getElementById('chatbot-text').value = '';
                    })
                    .catch(error => {
                         console.error('Error:', error);
                       
                    });
                });
            });
        </script>

<script src="{{ asset('/build/assets/app-29188eb5.js') }}"></script>
    </div>
</body>
</html>
