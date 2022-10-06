<template>
  <div>
    <SideNavBar />
    <div>
        <h1>Home Admin</h1>
        <Pie :chart-data="pieData6"/>
    </div>

  </div>

</template>

<script>
import SideNavBar from '@/components/SideNavBar.vue';
import axios from 'axios';
import { Pie } from 'vue-chartjs';

import {
ArcElement,
CategoryScale, Chart as ChartJS, Legend, Title,
Tooltip
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)
export default {
    components: { SideNavBar, Pie },
    props: {

    },
    data() {
        return {
            loaded: false,
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
            }).catch(error =>{
                console.log(error);
            });
        },
    
        createPie(numQuestion) {
            let answers = this.data.filter(x => x.num_question === numQuestion)
            let chartData = {
                "labels": [],
                "datasets": [
                    {
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
            }
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
}
  @media (max-width: 768px){
  .el-row{
    margin-left: 0px;
  }
}
</style>