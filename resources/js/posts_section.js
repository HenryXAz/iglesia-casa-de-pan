import 'tinymce/tinymce';

import tinymce from "tinymce";

tinymce.DOM.addClass(tinymce.DOM.select('h1'), 'text-2xl font-bold')
tinymce.DOM.addClass(tinymce.DOM.select('p'), 'text-justify')
tinymce.DOM.addClass(tinymce.DOM.select('ul'), 'max-w-md space-y-1 text-light-text dark:text-dark-text list-disc list-inside marker:text-main-primary')

tinymce.DOM.addClass(tinymce.DOM.select('table'), 'w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400')
tinymce.DOM.addClass(tinymce.DOM.select('th'), 'p-2 text-sm bg-light-color-2 text-light-text dark:text-dark-text dark:bg-dark-color-3 text-left')
tinymce.DOM.addClass(tinymce.DOM.select('td'), 'p-2 text-sm dark:text-dark-text text-light-text bg-color-light dark:bg-dark-color-2')
tinymce.DOM.addClass(tinymce.DOM.select('tr'), 'bg-white border-b dark:bg-gray-800 dark:border-gray-700')
