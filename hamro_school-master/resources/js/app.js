/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Select2Css from 'select2/dist/css/select2.min.css'
import Select2 from 'select2'


window.Vue = require('vue');
Vue.component('select2', Select2);
ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            '|',
            'bulletedList',
            'numberedList',
            '|',
            'insertTable',
            '|',
            'undo',
            'redo'
        ]
    },
    table: {
        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
    },
    language: 'en'
};
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( 'There was a problem initializing the editor.', error );
    } );


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
