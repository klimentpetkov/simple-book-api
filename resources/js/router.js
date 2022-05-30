import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Home';
import BooksPublish from './components/BooksPublish';
import BooksIndex from "./pages/BooksIndex";
import BooksShow from "./pages/BooksShow";
import Logout from "./actions/Logout";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/', component: Home,
            meta: { title: 'Home' }
        }, {
            path: '/books/publish', component: BooksPublish,
            meta: { title: 'Publish new book' }
        }, {
            path: '/books', component: BooksIndex,
            meta: { title: 'Books' }
        }, {
            path: '/books/:id', component: BooksShow,
            meta: { title: 'Book Details' }
        }, {
            path: '/logout', component: Logout
        }
    ],
    mode: 'history'
});
