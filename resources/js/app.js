import './bootstrap';

window.Echo.channel('my-channel')
    .listen('.my-event', (e) => {
        console.log('Message received:', e);
        if(!(window.peopleId == e.useridentifier)){
displayMessage(e.message, e.useridentifier, e.username,e.createdat);
        }
    });