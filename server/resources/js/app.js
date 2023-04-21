require('./bootstrap');

// Vue.js をインポート
import Vue from 'vue';

// コンポーネントをインポート
import editTextCommon from './components/editTextCommon/index.vue';
import taskSearchCommon from './components/taskSearchCommon/index.vue';

// コンポーネント登録
Vue.component('edit-text-common', editTextCommon);
Vue.component('task-search-common', taskSearchCommon);

// Vueインスタンスを作成してマウント
new Vue({
    el: '#app'
});
