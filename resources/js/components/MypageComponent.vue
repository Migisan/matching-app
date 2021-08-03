<template>
    <div>
        <a href="/setting" class="setting"><i class="fas fa-cog"></i></a><!-- .setting -->
        <div class="mypage-img">
            <img :src="user.image" :alt="user.name + 'の写真'" />
        </div><!-- .mypage-img -->
        <div class="mypage-name">
            {{ user.name }}
        </div><!-- .mypage-name -->
        <form @submit.prevent class="mypage-form">
            <textarea type="text" name="introduction" id="introduction" placeholder="紹介文を入力してください。" v-model="user.introduction" class="mypage-introduction" >
            </textarea><!-- .mypage-introduction -->
            <button type="submit" @click="update" class="update-btn">プロフィール更新</button>
        </form>
        <a href="/logout" class="logout-btn btn btn-danger" @click.prevent="logout">ログアウト</a>
        <form id="logout" action="/logout" method="POST" class="d-none">
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </div>
</template>

<script>
    const axios = require('axios')

    export default {
        name: "MypageComponent",
        props: {
            csrf: {
                type: String,
                required: true,
            }
        },
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
                axios.get('/mypage/info').then(res => {
                    console.log(res)
                    this.user = res.data
                }).catch(e => {
                    console.log(e)
                })
            },
            update: function(){
                axios.post('/mypage/update', {introduction: this.user.introduction}).then(res => {
                    console.log(res);
                    if(res.data.result){
                        alert("プロフィールを更新しました。");
                    }
                    this.user = res.data.response;
                }).catch(e => {
                    console.log(e);
                    alert("プロフィールを更新出来ませんでした。");
                });
            },
            logout: function() {
                document.getElementById('logout').submit();
            },
            valitate: function(){},
        },
    }
</script>
