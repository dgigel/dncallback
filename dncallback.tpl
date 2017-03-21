<div id="dncallback_block" class="block">
    <p class="title_block">Обратный звонок</p>
    <div class="block_content clearfix">
        <input id="dncallback_current_url" name="dncallback_current_url" type="text" value="//{nocache}{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}{/nocache}" hidden>
        <p>
            <label for="dncallback_name">Имя</label>
            <input id="dncallback_name" name="dncallback_name" type="text">
        </p>
        <p>
            <label for="dncallback_phone">Телефон</label>
            <input id="dncallback_phone" name="dncallback_phone" type="text">
        </p>
        <p>
            <input id="dncallback_add" type="button" class="button" value="Обратный звонок">
        </p>
    </div>
</div>

<div id="dncallback_question_block" class="block">
    <p class="title_block">Задать вопрос</p>
    <div class="block_content clearfix">
        <input id="dncallback_current_url" name="dncallback_current_url" type="text" value="//{nocache}{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}{/nocache}" hidden>
        <p>
            <label for="dncallback_question_name">Имя</label>
            <input id="dncallback_question_name" name="dncallback_question_name" type="text">
        </p>
        <p>
            <label for="dncallback_question_email">E-mail</label>
            <input id="dncallback_question_email" name="dncallback_question_email" type="text">
        </p>
        <p>
            <label for="dncallback_question_phone">Телефон</label>
            <input id="dncallback_question_phone" name="dncallback_question_phone" type="text">
        </p>
        <p>
            <label for="dncallback_question_question">Телефон</label>
            <textarea id="dncallback_question_question" name="dncallback_question_question"></textarea>
        </p>
        <p>
            <input id="dncallback_question_add" type="button" class="button" value="Обратный звонок">
        </p>
    </div>
</div>