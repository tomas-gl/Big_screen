import { createRouter, createWebHistory } from 'vue-router';
import SurveyPage from '../views/user/SurveyPage';
import SurveyResult from '../views/user/SurveyResult';

const routes = [
    {
        path: '/',
        name: 'Survey',
        component: SurveyPage
    },
    {
        path: '/surveyresult',
        name: 'SurveyResult',
        component: SurveyResult
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router