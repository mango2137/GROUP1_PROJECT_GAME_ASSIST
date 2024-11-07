require('dotenv').config();
const express = require('express');
const axios = require('axios');
const querystring = require('querystring');
const app = express();
const port = 3000;

const RIOT_CLIENT_ID = process.env.RIOT_CLIENT_ID;
const RIOT_CLIENT_SECRET = process.env.RIOT_CLIENT_SECRET;
const RIOT_REDIRECT_URI = 'http://localhost:3000/callback'; // Musisz ustawić tę wartość w Riot Developer Portal

// Krok 1: Przekierowanie do Riot Games w celu autoryzacji
app.get('/authorize', (req, res) => {
    const authUrl = `https://id.riotgames.com/oauth/authorize?response_type=code&client_id=${RIOT_CLIENT_ID}&redirect_uri=${encodeURIComponent(RIOT_REDIRECT_URI)}&scope=openid&state=random_state_string`;
    res.redirect(authUrl);
});

// Krok 2: Przechwycenie kodu autoryzacji i wymiana go na tokeny
app.get('/callback', async (req, res) => {
    const code = req.query.code;
    
    if (!code) {
        return res.status(400).send('Brak kodu autoryzacji');
    }

    try {
        const tokenResponse = await axios.post('https://id.riotgames.com/oauth/token', querystring.stringify({
            grant_type: 'authorization_code',
            code: code,
            redirect_uri: RIOT_REDIRECT_URI,
            client_id: RIOT_CLIENT_ID,
            client_secret: RIOT_CLIENT_SECRET
        }), {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });

        const { access_token, refresh_token } = tokenResponse.data;

        // Zapisz tokeny, sesje, itp. - w zależności od Twoich potrzeb
        res.send(`
            <h1>Logowanie zakończone!</h1>
            <p>Token dostępu: ${access_token}</p>
            <p>Token odświeżający: ${refresh_token}</p>
        `);
    } catch (error) {
        console.error(error);
        res.status(500).send('Błąd podczas wymiany kodu na token');
    }
});

// Uruchomienie serwera
app.listen(port, () => {
    console.log(`Serwer działa na http://localhost:${port}`);
});