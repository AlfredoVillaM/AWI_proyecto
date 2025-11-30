<x-base>
    <h1 class="text-5xl font-bold">Libros</h1>
    
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn" onclick="save_libro.showModal()">Añadir</button>

    <dialog id="save_libro" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Añadir Libro</h3>
            <form action="">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">ISBN</legend>
                    <input type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Título</legend>
                    <input type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Autor</legend>
                    <input type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Editorial</legend>
                    <input type="text" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Fecha de publicación</legend>
                    <input type="date" class="input" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Sinopsis</legend>
                    <textarea class="textarea h-24" required></textarea>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Portada</legend>
                    <input type="file" class="file-input" required />
                </fieldset>
                <button type="submit" class="btn btn-neutral" onclick="save_libro.close()">Añadir</button>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

    <div class="card bg-base-100 w-96 shadow-sm">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">Título Libro</h2>
            <p>Autor</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
</x-base>