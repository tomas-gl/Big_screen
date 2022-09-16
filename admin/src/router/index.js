import { createRouter, createWebHistory } from 'vue-router'
import AnswersAdmin from '../views/admin/AnswersAdmin.vue'
import HomeAdmin from '../views/admin/HomeAdmin.vue'
import LoginAdmin from '../views/admin/LoginAdmin.vue'
import SurveyAdmin from '../views/admin/SurveyAdmin.vue'
import SurveyPage from '../views/user/SurveyPage.vue'

const routes = [
    {
        path: '/',
        name: 'Survey',
        component: SurveyPage
    },
    {
        path: '/administration',
        name: 'LoginAdmin',
        component: LoginAdmin
    },
    {
        path: '/administration/home',
        name: 'HomeAdmin',
        component: HomeAdmin
    },
    {
        path: '/administration/survey',
        name: 'SurveyAdmin',
        component: SurveyAdmin
    },
    {
        path: '/administration/answers',
        name: 'AnswersAdmin',
        component: AnswersAdmin
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router