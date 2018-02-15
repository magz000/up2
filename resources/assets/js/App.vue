<template>
    <div>
        <nav class="navbar navbar-findcond">
            <div class="container">
            <div class="navbar-header">
                <router-link class="navbar-brand" :to="{name: 'Home'}">UP Engineering Research and Development
                    Foundation Inc.
                </router-link>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li class="active">-->

                    <!--</li>-->
                    <li>
                        <router-link class="navbar-link" :to="{name: 'Home'}">Home</router-link>
                    </li>

                    <li>
                        <router-link class="navbar-link" :to="{name: 'Home'}">Mission & Vision</router-link>
                    </li>

                    <li>
                        <router-link class="navbar-link" :to="{name: 'Home'}">Contact Us</router-link>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <div class="container" style="margin-bottom: 20px;">
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>

    export default {}
</script>
