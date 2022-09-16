import { createRouter, createWebHistory } from 'vue-router';
import SurveyPage from '../views/user/SurveyPage';
import SurveyResultPage from '../views/user/SurveyResultPage';

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
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router