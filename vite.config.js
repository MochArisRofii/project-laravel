import { defineConfig } from  'vite' ; 
import laravel from  'laravel-vite-plugin' ; 

export  default  defineConfig ({ 
    plugins : [ 
        laravel ({ 
            input : [ 
                'resources/sass/app.scss' , // Baris baru kita, Anda dapat mengubah app.scss menjadi Whatever.scss 
                'resources/js/app.js' , 
            ], 
            refresh : true , 
        }), 
    ], 
});