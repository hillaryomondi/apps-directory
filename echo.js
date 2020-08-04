require('dotenv').config();

const env = process.env;
require('laravel-echo-server').run({
    authHost: `http://sad-server`,
    devMode: env.APP_DEBUG,
    database: 'redis',
    protocol: "https",
    subscribers: {http: true, redis: true},
    sslCertPath: env.LARAVEL_ECHO_SERVER_SSL_CRT,
    sslKeyPath: env.LARAVEL_ECHO_SERVER_SSL_KEY,
    databaseConfig: {
        redis: {
            "host": env.REDIS_HOST,
            "port": env.REDIS_PORT,
            "password": env.REDIS_PASSWORD,
            "keyPrefix": env.REDIS_KEY_PREFIX,
            "options": {
                "db": "0"
            }
        }
    },
    host: null,
    port: 6001,
    apiOriginAllow: {
        allowCors: true,
        allowOrigin: '*',
        allowMethods: 'GET, POST',
        allowHeaders: 'Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id'
    }
});
