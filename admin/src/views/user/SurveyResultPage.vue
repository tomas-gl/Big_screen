<template>
    <div>
        <HeaderUser />
        <span>test</span>
    </div>
</template>

<script>
import HeaderUser from '@/components/HeaderUser.vue';
// import SurveyCard from '@/components/SurveyCard.vue';
import axios from 'axios';

export default {
    components: { HeaderUser,  },

    methods:{
        
        async getSurveyResultsById(){ 
            let url = `http://127.0.0.1:8000/api/getSurveyResult/${this.$route.params.token}`;
                await axios.get(url).then(response =>{
                    console.log(response.data);
            });
        },
    },
    mounted() {
       this.getSurveyResultsById();
    }
}

</script>

<style>
</style>