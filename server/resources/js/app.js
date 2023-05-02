require('./bootstrap');

//新しいVueアプリケーションインスタンスを作成
import {
    createApp
} from 'vue'

// コンポーネントをインポート
import editTextCommon from './components/editTextCommon/index.vue';
import taskSearchCommon from './components/taskSearchCommon/index.vue';

// コンポーネント登録とマウント
createApp({
    components: {
        taskSearchCommon,
        editTextCommon,
    }
}).mount('#app');
