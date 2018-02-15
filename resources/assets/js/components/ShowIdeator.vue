<template>
    <div class="container">
        <!--<router-link class="btn btn-primary pull-right" :to="{name: 'Ideator'}">Back</router-link>-->
        <div class="row">
            <a class="btn btn-primary pull-right" id="comments" @click="goBack">Back</a>
        </div>

        <div class="row" style="padding: 20px;">
            <div class="col-md-3">


                <!--<div class="_profile-pic" style="background-image: url('/img/test.png');"></div>-->
                <div class="_profile-pic" :style="'background-image: url(\'' + (mentor.image != null ? '/img/mentors/' + mentor.image : '/mentor/1/img') + '\');'"></div>

                <h6>{{mentor.name}}</h6>

                <h2>{{ideator.name}}</h2>


            </div>

            <div class="col-md-9">
                <div class="_profile-pic" :style="'background-image: url(\'' + (ideator.cover_image != null ? '/img/cover/' + ideator.cover_image : '/img/placeholder.png') + '\');' +
                 'height:300px!important; padding-top: 0px; margin-bottom: 15px;'"></div>

                <p v-html="ideator.description"></p>

            </div>
        </div>


        <!--<div class="row">-->
        <!--<div class="col-md-6">-->
        <!--<div class="__card" style="height: 200px; padding: 10px;">test</div>-->
        <!--</div>-->

        <!--<div class="col-md-6">-->
        <!--<div class="__card" style="height: 200px; padding: 10px;">test</div>-->
        <!--</div>-->
        <!--</div>-->

    </div>

</template>

<script>
    export default {
        data() {
            return {
                ideator: {},
                mentor: {}
            }
        },
        created: function () {
            this.getItem();
        },

        methods: {
            getItem() {
                let uri = `/api/ideator/${this.$route.params.id}`;
                this.axios.get(uri).then((response) => {
                    this.ideator = response.data;
                    this.mentor = response.data.mentors[0].mentor;
                });
            },

            goBack() {
                // this.$route.router.go(-1);
                history.back();
            },
        }
    }
</script>
