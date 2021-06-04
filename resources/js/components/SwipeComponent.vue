<template>
    <div>
        <template v-if="user">
            <!-- ユーザー表示 -->
            <div class="photo">
                <img :src="user.image" :alt="user.name + 'の写真'" />
                <div class="name">{{ user.name }}</div>
            </div>

            <div class="tcontrols">
                <div class="container">
                    <div class="row">
                    <!-- ごめんなさい -->
                        <div class="col-md-6 mb-1 text-center">
                            <form @submit.prevent>
                                <button @click="no" type="submit" class="no">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                        <!-- いいね -->
                        <div class="col-md-6 mb-1 text-center">
                            <form @submit.prevent>
                                <button @click="yes" type="submit" class="yes">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template v-else>
            <p class="text-center">該当のユーザーがいません</p>
        </template>
    </div>
</template>

<script>
    const axios = require('axios')

    export default {
        name: "SwipeComponent",
        data: function(){
            return {
                user: null
            }
        },
        mounted() {
            this.getUser()
            console.log('Component mounted.')
        },
        methods: {
            getUser: function(){
                axios.get('/swipes/list').then(res => {
                    console.log(res)
                    this.user = res.data
                }).catch(e => {
                    console.log(e)
                })
            },
            yes: function(){
                axios.post('/swipes/store', {to_user_id: this.user.id, like: 1}).then(res => {
                    console.log(res);
                    if(res.data.result){
                        alert("いいねしました。");
                    }
                    this.user = res.data.response;
                }).catch(e => {
                    console.log(e);
                    alert("いいね出来ませんでした。");
                });
            },
            no: function(){
                axios.post('/swipes/store', {to_user_id: this.user.id, like: 0}).then(res => {
                    console.log(res);
                    if(res.data.result){
                        alert("ごめんなさいしました。");
                    }
                    this.user = res.data.response;
                }).catch(e => {
                    console.log(e);
                    alert("ごめんなさい出来ませんでした。");
                });
            },
            valitate: function(){},
        },
    }
</script>
