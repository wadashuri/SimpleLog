require('./bootstrap');

// Vue.js をインポート
import Vue from 'vue';

// コンポーネントをインポート
import editTextCommon from './components/editTextCommon/index.vue';
import dateSearchCommon from './components/dateSearchCommon/index.vue';

// コンポーネント登録
Vue.component('edit-text-common', editTextCommon);
Vue.component('date-search-common', dateSearchCommon);

// Vueインスタンスを作成してマウント
new Vue({
    el: '#app'
});
