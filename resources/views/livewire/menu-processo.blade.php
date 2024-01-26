<div class="flex flex-col hidden p-2 bg-white shadow-sm rounded-xl w-60 md:flex ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10" id="sideNav">
    <nav>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-700 hover:to-gray-300 hover:text-white"
           href="{{url("processo/$id")}}">
            <i class="mr-2 fas fa-file-alt"></i>Informações
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-700 hover:to-gray-300 hover:text-white"
           href="{{url("lote/$id")}}">
            <i class="mr-2 fas fa-users"></i>Lotes
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-gray-700 hover:to-gray-300 hover:text-white"
           href="{{url("arquivo/$id")}}">
            <i class="mr-2 fas fa-store"></i>Arquivos
        </a>
    </nav>
</div>
