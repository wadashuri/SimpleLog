require('./bootstrap');

// Vue.js をインポート
import Vue from 'vue';

// コンポーネントをインポート
import editTextCommon from './components/editTextCommon/index.vue';

// コンポーネント登録
Vue.component('edit-text-common', editTextCommon);

// Vueインスタンスを作成してマウント
new Vue({
    el: '#app'
});
