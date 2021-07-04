<div class="modal fade" id="<?=$modal_id?>Toggle" aria-hidden="true" aria-labelledby="<?=$modal_id?>ToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="<?=$modal_id?>ToggleLabel">Вы уверены, что хотите выполнить это действие?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="POST" action="<?=$action?>">
                    <input type="hidden" value="" name="id" id="<?=$modal_id?>Input">
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>