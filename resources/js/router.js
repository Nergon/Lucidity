import Vue from 'vue';
import VueRouter from 'vue-router';

import Login from "./components/Login";
import App from "./components/App";

Vue.use(VueRouter);

const routes = [
    {path: '/login', component: Login},
    {path: '/', component: App, meta: {requiresAuth: true}}
];

const router = new VueRouter({
    mode: 'history',
    routes
});

function isLoggedIn() {
    return localStorage.getItem("auth");
}

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if(!isLoggedIn()) {
            next({
                path: '/login'
            })
        } else {
            next();
        }
    } else {
        next();
    }

});

export default router;
