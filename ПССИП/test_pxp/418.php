<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Тест про колледж</title>
    <style>
    /* Можно скопировать из вашего стиля */
    #dragContainer, #dropContainer {
        width: 220px;
        min-height: 110px;
        border: 1px solid #aaa;
        padding: 10px;
        margin-bottom: 15px;
    }
    #dragContainer {
        display: flex;
        justify-content: space-around;
        margin-right: 20px;
    }
    .dragItem {
        width: 60px;
        height: 60px;
        background-color: #d0e4fd;
        border: 1px solid #5588cc;
        border-radius: 8px;
        line-height: 60px;
        text-align: center;
        cursor: grab;
        user-select: none;
        font-weight: bold;
        font-size: 18px;
    }
    .dropZone {
        margin-bottom: 10px;
        border: 2px dashed #777;
        text-align: center;
        color: #444;
        background: #f9f9f9;
    }
    #matches {
        display: flex;
        gap: 10px;
    }
    </style>
    <script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var dragElem = document.getElementById(data);

        if (ev.target.classList.contains('dropZone')) {
            if(ev.target.children.length === 0) {
                ev.target.appendChild(dragElem);
                updateHiddenFields();
            }
        } else if (ev.target.id === 'dragContainer') {
            ev.target.appendChild(dragElem);
            updateHiddenFields();
        } else if (ev.target.parentElement && ev.target.parentElement.id === 'dragContainer') {
            ev.target.parentElement.appendChild(dragElem);
            updateHiddenFields();
        }
    }

    function updateHiddenFields() {
        function getDropValue(dropId) {
            var drop = document.getElementById(dropId);
            if(drop.children.length === 1) {
                return drop.children[0].getAttribute('data-value');
            }
            return '';
        }
        document.getElementById('drag1').value = getDropValue('q6_drop1');
        document.getElementById('drag2').value = getDropValue('q6_drop2');
        document.getElementById('drag3').value = getDropValue('q6_drop3');
    }

    window.onload = updateHiddenFields;
    </script>
</head>
<body>
    <p>Романова Екатерина 41ИБ. Тест про колледж</p>

    <form action="9-1.php" method="post">
        <p>1. Какая фамилия у директора МФ УО БТЭУ ПК?</p>
        <p>
            <input type="hidden" name="q1_" value="Левшунов">
            Ответ:&nbsp;
            <input type="text" name="q1" required>
        </p>

        <p>2. Установите соответствие между категориями предметами и преподавателями (главными).</p>
        <table>
            <tr>
                <td>Инструментальное ПО</td>
                <td>
                    <select name="q21" required>
                        <option value="" disabled selected>Выберите вариант</option>
                        <option>Селицкий В.А.</option>
                        <option>Шутько Е.И.</option>
                        <option>Васильева В.В.</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Защита от ЧС</td>
                <td>
                    <select name="q22" required>
                        <option value="" disabled selected>Выберите вариант</option>
                        <option>Гришкевич А.А.</option>
                        <option>Бойко В.А.</option>
                        <option>Бадай И.Н</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Компьютерные Сети</td>
                <td>
                    <select name="q23" required>
                        <option value="" disabled selected>Выберите вариант</option>
                        <option>Хайков В.П.</option>
                        <option>Калаева С.Г.</option>
                        <option>Шаганов С.П.</option>
                    </select>
                </td>
            </tr>
        </table>

        <p>3. Какие есть формы обучения в МФ УО БТЭУ?</p>
        <input id="q51" type="radio" value="q51" name="q5" required> Дневное и вечернее<br>
        <input id="q52" type="radio" value="q52" name="q5"> Дневное и заочное<br>
        <input id="q53" type="radio" value="q53" name="q5"> Заочное и вечернее<br>
        <input id="q54" type="radio" value="q54" name="q5"> Дневное<br>

        <p>4. Отметьте все специальности в колледже:</p>
        <input id="q41" type="checkbox" value="q41" name="q4[]" > техник-экономист <br>
        <input id="q42" type="checkbox" value="q42" name="q4[]" > техник-программист<br>
        <input id="q43" type="checkbox" value="q43" name="q4[]" > сварщик <br>
        <input id="q44" type="checkbox" value="q44" name="q4[]" > дизайнер интерьера <br>
        <input id="q45" type="checkbox" value="q45" name="q4[]" > товаровед <br>

        <p>
        5. Установите взаимно-однозначное соответствие (выберите значения в селектах):<br><br>
        Вопрос 1. Сколько лет нашему филиалу?<br>
        Вопрос 2. Сколько лет специальность "техник-программист" существует в колледже?<br>
        Вопрос 3. Сколько лет специальность "техник-экономист" существует в колледже?<br>
        </p>

        <div id="matches">
            <div id="dragContainer" ondrop="drop(event)" ondragover="allowDrop(event)">
                <div id="drag2" class="dragItem" draggable="true" ondragstart="drag(event)" data-value="2">2</div>
                <div id="drag65" class="dragItem" draggable="true" ondragstart="drag(event)" data-value="65">65</div>
                <div id="drag5" class="dragItem" draggable="true" ondragstart="drag(event)" data-value="5">5</div>
            </div>

            <div id="dropContainer" style="display:flex; flex-direction: column; gap: 10px;">
                <div id="q6_drop1" class="dropZone" ondrop="drop(event)" ondragover="allowDrop(event)">Блок для ответа 1</div>
                <div id="q6_drop2" class="dropZone" ondrop="drop(event)" ondragover="allowDrop(event)">Блок для ответа 2</div>
                <div id="q6_drop3" class="dropZone" ondrop="drop(event)" ondragover="allowDrop(event)">Блок для ответа 3</div>
            </div>
        </div>

        <input type="hidden" name="drag1" id="drag1" value="">
        <input type="hidden" name="drag2" id="drag2" value="">
        <input type="hidden" name="drag3" id="drag3" value="">

        <p><input type="submit" value="РЕЗУЛЬТАТ"></p>
    </form>

</body>
</html>