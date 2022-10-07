<template>
  <div>
    <SideNavBar />
    <el-row justify="center">
        <el-col :xs="40" :sm="36" :lg="32">
            <span class="title-page">Accueil</span>
            <el-row justify="center"
                    :gutter="20">
                <el-col :span="8">   
                    <Pie :chart-data="pieData6"/>
                </el-col>
                <el-col :span="8">   
                    <Pie :chart-data="pieData7"/>
                </el-col>
            </el-row>
            <el-row justify="center"
                    :gutter="20">
                <el-col :span="8">   
                    <Pie :chart-data="pieData10"/>
                </el-col>
                <el-col :span="8">   
                    <Radar :chart-data="radarData"/>
                </el-col>
            </el-row>
        </el-col>
    </el-row>
  </div>

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';
import axios from 'axios';
import { ArcElement, CategoryScale, Chart as ChartJS, Legend, LineElement, PointElement, RadialLinearScale, Title, Tooltip } from 'chart.js';
import { Pie, Radar } from 'vue-chartjs';

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)
ChartJS.register(Title, Tooltip, Legend, PointElement, RadialLinearScale, LineElement)

export default {
    components: { SideNavBar, Pie, Radar },
    data() {
        return {
            data: [],
            pieData6: {},
            pieData7: {},
            pieData10: {},
            radarData: {}
        }
    },
    methods: {
        async getSurveyData(){
            let url = 'http://127.0.0.1:8000/api/getSurveyDatas'
            await axios.get(url).then(response =>{
                this.data = response.data
                this.pieData6 = this.createPie(6)
                this.pieData7 = this.createPie(7)
                this.pieData10 = this.createPie(10)
                this.radarData = this.createRadar()
            }).catch(error =>{
                console.log(error);
            });
        },
    
        createPie(numQuestion) {
            let answers = this.data.answers.filter(x => x.num_question === numQuestion)
            let chartData = {
                "labels": [],
                "datasets": [
                    {
                        "backgroundColor": [],
                        "data": []
                    }
                ]
            }
            let temp = {}
            for (const answer of answers) {
                if (temp[answer.answer])
                    temp[answer.answer] +=1
                else
                    temp[answer.answer] = 1
            }

            for (const t in temp) {
                chartData.labels.push(t)
                chartData.datasets[0].data.push(temp[t])
                chartData.datasets[0].backgroundColor.push(this.randomColorChart())
            }

            return chartData
        },
        randomColorChart() {
            var randomColor = Math.floor(Math.random()*16777215).toString(16);
            return "#" + randomColor
        },
        createRadar() {
            let answers = this.data.answers.filter(x => [11, 12, 13, 14, 15].includes(x.num_question))
            console.log(answers)
            let chartData = {
                "labels": ["Question 11", "Question 12", "Question 13", "Question 14", "Question 15"],
                "datasets": [
                    {
                        "fill": true,
                        "borderColor": 'rgb(255, 99, 132)',
                        "pointBackgroundColor": 'rgb(255, 99, 132)',
                        "label": "Questions 11 à 15",
                        "data": []
                    }
                ]
            }
            for (const answer of answers) {

                switch (answer.num_question) {
                    case 11:   
                        if (chartData.datasets[0].data.length == 0)
                            chartData.datasets[0].data.push(parseInt(answer.answer))
                        else
                            chartData.datasets[0].data[0] += parseInt(answer.answer)
                        break;
                    case 12:    
                        if (chartData.datasets[0].data.length == 1)
                            chartData.datasets[0].data.push(parseInt(answer.answer))
                        else
                            chartData.datasets[0].data[1] += parseInt(answer.answer) 
                        break;
                    case 13:     
                        if (chartData.datasets[0].data.length == 2)
                            chartData.datasets[0].data.push(parseInt(answer.answer))
                        else
                            chartData.datasets[0].data[2] += parseInt(answer.answer)
                        break;
                    case 14:    
                        if (chartData.datasets[0].data.length == 3)
                            chartData.datasets[0].data.push(parseInt(answer.answer))
                        else
                            chartData.datasets[0].data[3] += parseInt(answer.answer) 
                        break;
                    case 15:     
                        if (chartData.datasets[0].data.length == 4)
                            chartData.datasets[0].data.push(parseInt(answer.answer))
                        else
                            chartData.datasets[0].data[4] += parseInt(answer.answer)
                        break;
                }
            }
            chartData.datasets[0].data = chartData.datasets[0].data.map(x => x / (answers.length / 5))
            return chartData
        }
    },
    mounted() {
        this.getSurveyData();
    }

}
</script>

<style scoped>
.el-row{
  margin-left: 200px;
  margin-bottom: 50px;
}
  @media (max-width: 768px){
  .el-row{
    margin-left: 0px;
  }
}
</style>