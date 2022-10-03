import { createRouter, createWebHistory } from 'vue-router'
import AnswersAdmin from '../views/admin/AnswersAdmin.vue'
import HomeAdmin from '../views/admin/HomeAdmin.vue'
import LoginAdmin from '../views/admin/LoginAdmin.vue'
import SurveyAdmin from '../views/admin/SurveyAdmin.vue'
import SurveyPage from '../views/user/SurveyPage.vue'
import SurveyResultPage from '../views/user/SurveyResultPage.vue'
import store from '../store';


store.subscribe( (state) => {
    localStorage.setItem('loggedAdmin',  JSON.stringify(state));
	console.log(localStorage.getItem('loggedAdmin'));
    // return state
});

// localStorage.clear();
// localStorage.setItem('loggedAdmin', "");
// const loggedAdmin = localStorage.getItem('loggedAdmin');
console.log(localStorage.getItem('loggedAdmin'));
console.log(store.state.loggedAdmin);

const routes = [
    {
        path: '/',
        name: 'Survey',
        component: SurveyPage
    },
    {
        path: '/surveyresult/:token?',
        name: 'SurveyResult',
        component: SurveyResultPage
    },
    {
        path: '/administration',
        name: 'LoginAdmin',
        component: LoginAdmin
    },
    {
        path: '/administration/home',
        name: 'HomeAdmin',
        component: HomeAdmin,
        meta:{
            needsAuth: true,
        }
    },
    {
        path: '/administration/survey',
        name: 'SurveyAdmin',
        component: SurveyAdmin,
        meta:{
            needsAuth: true,
        }
    },
    {
        path: '/administration/answers',
        name: 'AnswersAdmin',
        component: AnswersAdmin,
        meta:{
            needsAuth: true,
        }
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((to, from, next) =>{
    if(to.meta.needsAuth){
        if(localStorage.getItem('loggedAdmin')){
            next();
        }
        else{
            next("/administration");
        }
    }
    else{
        next();
    }
})


export default router