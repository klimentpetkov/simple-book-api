import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Home';
// import ExampleComponent from "./components/ExampleComponent";
// import ContactsCreate from "./views/ContactsCreate";
// import ContactsShow from "./views/ContactsShow";
// import ContactsEdit from "./views/ContactsEdit";
// import ContactsIndex from "./views/ContactsIndex";
// import BirthdaysIndex from "./views/BirthdaysIndex";
// import Logout from "./Actions/Logout";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: Home,
            meta: { title: 'Home' }
        }, /*{
            path: '/books/publish', component: BooksPublish,
            meta: { title: 'Publish new book' }
        },*/

        /*{
            path: '/contacts', component: ContactsIndex,
            meta: { title: 'Contacts' }
        }, {
            path: '/contacts/create', component: ContactsCreate,
            meta: { title: 'Add New Contact' }
        }, {
            path: '/contacts/:id', component: ContactsShow,
            meta: { title: 'Details for Contact' }
        }, {
            path: '/contacts/:id/edit', component: ContactsEdit,
            meta: { title: 'Edit Contact' }
        }, {
            path: '/birthdays', component: BirthdaysIndex,
            meta: { title: 'This Month\'s Birthdays' }
        }, {
            path: '/logout', component: Logout
        }*/
    ],
    mode: 'history'
});

/*
import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home';
import Books from './pages/Books';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/books',
            name: 'books',
            component: Books
        },
    ]
});

export default router;
*/
