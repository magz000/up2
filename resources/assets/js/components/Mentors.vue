<template>
    <div class="container">

        <div class="row">
            <!--<router-link  class="btn btn-primary pull-right" :to="{name: 'Home'}">Back</router-link>-->
            <a class="btn btn-primary pull-right" id="comments" @click="goBack">Back</a>

            <h2>Mentors</h2>
        </div>

        <!--<br><br>-->
        <div class="row">
            <div class="col-md-12">


                <div class="list-container">

                    <div class="col-md-3 col-xs-6 col-sm-6" style="padding: 0px; margin: 0px;"
                         v-for="mentor in mentors">
                        <router-link :to="{name: 'ShowMentor', params: {id: mentor.id}}">
                            <div class="__card __search_item">
                                <div class="__img">
                                    <!--{{'background-image: url(' + (mentor.image != null ? '/img/mentors/' + mentor.image : '/mentor/1/img') + ');'}}-->
                                    <div :style="'background-image: url(\'' + (mentor.image != null ? '/img/mentors/' + mentor.image : '/mentor/1/img') + '\');'" ></div>
                                </div>
                            </div>

                            <div class="content">
                                <h6>{{mentor.name}}</h6>
                            </div>
                        </router-link>
                    </div>


                    <paginate
                            :page-count="pageCount"
                            :click-handler="fetch"
                            :prev-text="'Prev'"
                            :next-text="'Next'"
                            :container-class="'pagination'">
                    </paginate>


                    <!--<a href="#" id="comments" @click="report(mentor.id)">Report</a>-->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                mentors: [],
                pageCount: 1,
                endpoint: '/api/mentor?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.mentors = data.data;
                        this.pageCount = data.last_page;
                    });
            },

            // report(id) {
            //     if (confirm('Are you sure you want to report this mentor?')) {
            //         axios.put('api/mentors/' + id + '/report')
            //             .then(response => this.removeSignature(id));
            //     }
            // },

            removeSignature(id) {
                this.mentors = _.remove(this.mentors, function (signature) {
                    return signature.id !== id;
                });
            },

            goBack() {
                // this.$route.router.go(-1);
                history.back();
            },
        }
    }
</script>