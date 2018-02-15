<template>
    <div class="container">
        <div style="z-index: -99999; position:absolute; background: url('/img/background.png'); height: 70%; width: 100%; left: 0; bottom: 10%;background-repeat: no-repeat; -webkit-background-size: cover;background-size: cover;"></div>

        <div class="row home-btn-container">
            <router-link :to="{name: 'Mentors'}" class="btn btn-primary home-btn"><span>MENTORS</span></router-link>

            <router-link :to="{name: 'Ideator'}" class="btn btn-primary home-btn">IDEATOR</router-link>
        </div>



    </div>
</template>

<script>
    export default {
    }
</script>

<style scoped>

</style>