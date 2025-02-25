import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    auth: {
        headers: {
            Authorization: `Bearer ` + import.meta.env.JWT_SECRET,
        },
    },
});

window.Echo.channel('testChannel').listen('TestingEvent', (e) => {
    console.log(e)
})

window.Echo.channel('messages')
    .listen('MessageSent', (e) => {
        console.log('Message received: ', e.message);
    });