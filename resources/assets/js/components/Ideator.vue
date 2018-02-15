<template>
    <div class="container">

        <!--<router-link class="btn btn-primary pull-right" :to="{name: 'Home'}">Back</router-link>-->
        <div class="row">
            <a class="btn btn-primary pull-right" id="comments" @click="goBack">Back</a>

            <h2>Ideator</h2>
        </div>



        <!--<br><br>-->
        <div class="row">

            <div class="list-container">

                <div class="row">
                <div class="col-md-3 col-xs-6 col-sm-6" style="padding: 0px; margin: 0px;"
                     v-for="ideator in ideators">
                    <router-link :to="{name: 'ShowIdeator', params: {id: ideator.id}}">
                        <div class="__card __search_item">
                            <div class="__img">
                                <!--<div style="background-image: url('/img/placeholder.png')"></div>-->

                                <div :style="'background-image: url(\'' + (ideator.cover_image != null ? '/img/cover/' + ideator.cover_image : '/img/placeholder.png') + '\');'" ></div>
                            </div>
                        </div>

                        <div class="content">
                            <h6>{{ideator.name}}</h6>
                        </div>
                    </router-link>
                </div>
                </div>

                <div class="row">

                <paginate
                        :page-count="pageCount"
                        :click-handler="fetch"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :container-class="'pagination'">
                </paginate>

                </div>

                <!--<a href="#" id="comments" @click="report(mentor.id)">Report</a>-->

            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                ideators: [],
                pageCount: 1,
                endpoint: '/api/ideator?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.ideators = data.data;
                        this.pageCount = data.last_page;
                    });
            },

            // report(id) {
            //     if (confirm('Are you sure you want to report this mentor?')) {
            //         axios.put('api/ideator/' + id + '/report')
            //             .then(response => this.removeSignature(id));
            //     }
            // },

            removeSignature(id) {
                this.ideators = _.remove(this.ideators, function (signature) {
                    return signature.id !== id;
                });
            },

            goBack(){
                // this.$route.router.go(-1);
                history.back();
            },
        }
    }
</script>