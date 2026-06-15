<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Ответы на экзаменационные вопросы по Data Science</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300&family=JetBrains+Mono:wght@400;600&display=swap');

  :root {
    --bg: #0f0e0c;
    --surface: #1a1916;
    --card: #201e1b;
    --border: #2e2b26;
    --accent: #e8a03a;
    --accent2: #c46b2d;
    --text: #e8e3d8;
    --text-muted: #9a9185;
    --green: #6dbf8c;
    --blue: #5fa8d3;
    --red: #d45f5f;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Source Serif 4', Georgia, serif;
    font-size: 16px;
    line-height: 1.7;
    min-height: 100vh;
  }

  header {
    background: linear-gradient(135deg, #1a1510 0%, #0f0e0c 60%);
    border-bottom: 1px solid var(--border);
    padding: 24px 20px 20px;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .header-inner {
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
  }

  .header-text {
    flex: 2;
    min-width: 180px;
  }

  .header-text h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: var(--accent);
    letter-spacing: 0.02em;
    line-height: 1.3;
  }

  .header-text p {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-top: 6px;
  }

  .search-box {
    flex: 1;
    min-width: 170px;
    display: flex;
    align-items: center;
  }

  .search-box input {
    width: 100%;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 8px 14px;
    border-radius: 28px;
    font-family: inherit;
    font-size: 0.85rem;
    outline: none;
    transition: all 0.2s;
  }
  .search-box input:focus { border-color: var(--accent); }
  .search-box input::placeholder { color: var(--text-muted); }

  /* Десктопные вкладки — по умолчанию flex */
  .filter-tabs {
    max-width: 900px;
    margin: 16px auto 0;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    transition: all 0.2s;
  }

  /* Стили для табов (кнопки) */
  .tab {
    padding: 5px 14px;
    border-radius: 40px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text-muted);
    font-family: 'Source Serif 4', serif;
    font-size: 0.78rem;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
  }
  .tab:hover { border-color: var(--accent); color: var(--accent); }
  .tab.active { background: var(--accent); color: #0f0e0c; border-color: var(--accent); font-weight: 600; }

  /* Выпадающий список (мобильная версия) — скрыт на десктопе */
  .mobile-section-select {
    display: none;
    width: 100%;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    padding: 10px 14px;
    border-radius: 40px;
    font-family: 'Source Serif 4', serif;
    font-size: 0.85rem;
    font-weight: 500;
    cursor: pointer;
    margin-top: 14px;
    outline: none;
    transition: all 0.2s;
  }
  .mobile-section-select:focus {
    border-color: var(--accent);
  }

  .progress-bar {
    height: 2px;
    background: var(--border);
    margin-top: 12px;
    border-radius: 2px;
    overflow: hidden;
  }
  .progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--accent), var(--accent2));
    border-radius: 2px;
    transition: width 0.3s;
  }

  main {
    max-width: 900px;
    margin: 0 auto;
    padding: 28px 16px 80px;
  }

  .section-header {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 40px 0 16px;
  }

  .section-num {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--accent2);
    color: #fff;
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .section-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.15rem;
    color: var(--accent);
  }

  .qa-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 10px;
    margin-bottom: 12px;
    overflow: hidden;
    transition: border-color 0.2s;
  }
  .qa-card:hover { border-color: #3e3b34; }
  .qa-card.hidden { display: none; }

  .qa-question {
    padding: 16px 20px;
    cursor: pointer;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    user-select: none;
  }

  .q-num {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.75rem;
    color: var(--accent);
    background: rgba(232,160,58,0.1);
    padding: 2px 8px;
    border-radius: 4px;
    flex-shrink: 0;
    margin-top: 2px;
    min-width: 44px;
    text-align: center;
  }

  .q-text {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text);
    flex: 1;
  }

  .q-arrow {
    color: var(--text-muted);
    font-size: 0.8rem;
    margin-top: 4px;
    flex-shrink: 0;
    transition: transform 0.25s;
  }
  .qa-card.open .q-arrow { transform: rotate(180deg); }

  .qa-answer {
    display: none;
    padding: 0 20px 20px 78px;
    font-size: 0.92rem;
    color: #cfc9bc;
    border-top: 1px solid var(--border);
  }
  .qa-card.open .qa-answer { display: block; }

  .qa-answer p { margin-top: 12px; }
  .qa-answer p:first-child { margin-top: 12px; }
  .qa-answer strong { color: var(--accent); font-weight: 600; }
  .qa-answer em { color: var(--blue); font-style: italic; }
  .qa-answer code {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.82rem;
    background: rgba(255,255,255,0.05);
    padding: 1px 6px;
    border-radius: 3px;
    color: var(--green);
  }
  .qa-answer pre {
    background: #161512;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 14px 16px;
    margin-top: 12px;
    overflow-x: auto;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.8rem;
    line-height: 1.6;
    color: var(--green);
  }
  .qa-answer ul, .qa-answer ol {
    margin-top: 10px;
    padding-left: 22px;
  }
  .qa-answer li { margin-bottom: 5px; }

  .tag {
    display: inline-block;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.7rem;
    padding: 2px 7px;
    border-radius: 3px;
    margin-right: 4px;
  }
  .tag-warn { background: rgba(212,95,95,0.15); color: var(--red); }
  .tag-tip { background: rgba(109,191,140,0.15); color: var(--green); }
  .tag-note { background: rgba(95,168,211,0.15); color: var(--blue); }

  .no-results {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-muted);
    font-style: italic;
    display: none;
  }

  /* === МОБИЛЬНАЯ АДАПТАЦИЯ === */
  @media (max-width: 680px) {
    header {
      padding: 18px 16px 16px;
    }
    .header-inner {
      flex-direction: column;
      gap: 12px;
    }
    .search-box {
      width: 100%;
    }
    .search-box input {
      width: 100%;
    }
    /* скрываем десктопные вкладки-кнопки */
    .filter-tabs {
      display: none;
    }
    /* показываем выпадающий список */
    .mobile-section-select {
      display: block;
      margin-top: 12px;
    }
    .qa-answer {
      padding: 0 16px 16px 68px;
    }
    .qa-question {
      padding: 14px 16px;
      gap: 10px;
    }
    .q-num {
      font-size: 0.7rem;
      min-width: 38px;
    }
    .section-header {
      margin: 32px 0 14px;
    }
  }

  @media (max-width: 480px) {
    .qa-answer {
      padding: 0 14px 14px 56px;
    }
    .q-text {
      font-size: 0.9rem;
    }
    .section-title {
      font-size: 1rem;
    }
  }
</style>
</head>
<body>

<header>
  <div class="header-inner">
    <div class="header-text">
      <h1>Экзамен Data-Science</h1>
      <p>40 вопросов · 5 разделов · нажмите на вопрос → ответ</p>
      <div class="progress-bar"><div class="progress-fill" id="progress" style="width:0%"></div></div>
    </div>
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="Поиск по вопросам / ответам...">
    </div>
  </div>

  <!-- Desktop tabs: обычные кнопки -->
  <div class="filter-tabs" id="desktopTabs">
    <button class="tab active" data-section="0">Все разделы</button>
    <button class="tab" data-section="1">1. Введение и ЖЦ</button>
    <button class="tab" data-section="2">2. Инструменты</button>
    <button class="tab" data-section="3">3. EDA и визуализация</button>
    <button class="tab" data-section="4">4. Машинное обучение</button>
    <button class="tab" data-section="5">5. Предобработка и этика</button>
  </div>

  <!-- Мобильный выпадающий список (select) -->
  <select id="mobileSectionSelect" class="mobile-section-select">
    <option value="0">Все разделы</option>
    <option value="1">1. Введение и ЖЦ данных</option>
    <option value="2">2. Инструменты и технологии</option>
    <option value="3">3. EDA и визуализация</option>
    <option value="4">4. Машинное обучение</option>
    <option value="5">5. Предобработка и этика</option>
  </select>
</header>

<main id="main"></main>
<div class="no-results" id="noResults">🔍 Ничего не найдено. Попробуйте изменить запрос или раздел.</div>

<script>
const data = [
  {
    section: 1,
    title: "Раздел 1. Введение и жизненный цикл данных",
    questions: [
      {
        q: "Дайте определение Data Science. Какие три компоненты лежат в её основе? Приведите пример задачи, где необходимы все три.",
        a: `<p><strong>Data Science</strong> — это междисциплинарная область, которая использует научные методы, алгоритмы и системы для извлечения знаний и выводов из структурированных и неструктурированных данных.</p>
<p>Три ключевые компоненты (диаграмма Венна Конвея):</p>
<ul>
  <li><strong>Математика и статистика</strong> — вероятность, линейная алгебра, статистические тесты, моделирование.</li>
  <li><strong>Программирование и технологии (Computer Science)</strong> — алгоритмы, базы данных, Python/R, инфраструктура.</li>
  <li><strong>Доменная экспертиза</strong> — понимание бизнес-процессов и предметной области.</li>
</ul>
<p><strong>Пример задачи</strong>, требующей всех трёх: <em>прогнозирование оттока клиентов банка</em>. Нужны статистика (построение модели логрегрессии), программирование (обработка данных в pandas, SQL-запросы к CRM), и бизнес-знание (понимать, что отток в банке — это закрытие счёта, а не просто отсутствие транзакции месяц).</p>`
      },
      {
        q: "Опишите полный жизненный цикл данных по методологии CRISP-DM. Для каждого этапа приведите по одному примеру конкретных действий аналитика.",
        a: `<p><strong>CRISP-DM</strong> (Cross-Industry Standard Process for Data Mining) включает 6 циклических этапов:</p>
<ol>
  <li><strong>Business Understanding (понимание бизнеса)</strong> — аналитик проводит встречу со стейкхолдерами и формулирует задачу: «снизить отток клиентов на 15% за квартал».</li>
  <li><strong>Data Understanding (понимание данных)</strong> — изучение доступных источников: выгрузка из CRM, анализ структуры таблиц, первичная статистика (df.describe()).</li>
  <li><strong>Data Preparation (подготовка данных)</strong> — очистка: удаление дублей, заполнение пропусков медианой, кодирование категорий (One-Hot Encoding).</li>
  <li><strong>Modeling (моделирование)</strong> — обучение нескольких моделей (логрегрессия, Random Forest) с кроссвалидацией.</li>
  <li><strong>Evaluation (оценка)</strong> — сравнение метрик на тестовой выборке, проверка бизнес-смысла: достаточно ли recall модели для удержания клиентов?</li>
  <li><strong>Deployment (внедрение)</strong> — интеграция модели в CRM-систему, настройка автоматических алертов для менеджеров.</li>
</ol>
<p><span class="tag tag-note">Важно</span> CRISP-DM — цикличная модель: по результатам оценки можно вернуться к любому предыдущему этапу.</p>`
      },
      {
        q: "Чем отличается модель OSEMN от CRISP-DM? В чём преимущества и недостатки каждой?",
        a: `<p><strong>OSEMN</strong> (произносится «awesome») — более техническая модель из 5 шагов:</p>
<ul>
  <li><strong>O</strong>btain — получить данные (API, скрейпинг, SQL)</li>
  <li><strong>S</strong>crub — очистить данные</li>
  <li><strong>E</strong>xplore — разведочный анализ (EDA)</li>
  <li><strong>M</strong>odel — построить модель</li>
  <li><strong>i<strong>N</strong>terpret — интерпретировать результаты</li>
</ul>
<p><strong>Сравнение:</strong></p>
<ul>
  <li>CRISP-DM больше ориентирован на <em>бизнес</em>: явно включает этапы понимания задачи и деплоя, подходит для корпоративных проектов и командной работы.</li>
  <li>OSEMN — <em>технически-центричная</em> модель, удобная для data scientist'а как личный чеклист. Нет явного этапа деплоя и взаимодействия с бизнесом.</li>
  <li>CRISP-DM более формализован, OSEMN — лаконичен и легко запоминается.</li>
</ul>`
      },
      {
        q: "Что такое ROI в контексте проектов Data Science? Приведите пример расчёта ROI для модели прогнозирования оттока клиентов.",
        a: `<p><strong>ROI (Return on Investment)</strong> — коэффициент возврата инвестиций: насколько выгода превышает затраты.</p>
<pre>ROI = (Выгода − Затраты) / Затраты × 100%</pre>
<p><strong>Пример расчёта:</strong></p>
<ul>
  <li>Средний доход от клиента: 5 000 руб./мес.</li>
  <li>Без модели ежемесячно уходило 200 клиентов → потери: 1 000 000 руб./мес.</li>
  <li>Модель позволяет удержать 30% уходящих → 60 клиентов × 5 000 = <strong>300 000 руб./мес. сохранено</strong></li>
  <li>Стоимость разработки и поддержки модели: 50 000 руб./мес.</li>
  <li><strong>ROI = (300 000 − 50 000) / 50 000 × 100% = 500%</strong></li>
</ul>
<p>ROI помогает обосновать инвестиции в DS-проект перед руководством и приоритизировать проекты между собой.</p>`
      },
      {
        q: "Назовите четыре основные роли в Data Science-команде. Чем отличаются их задачи и инструменты?",
        a: `<ul>
  <li><strong>Data Analyst</strong> — отвечает на конкретные бизнес-вопросы с помощью данных: строит отчёты, дашборды, делает статистические анализы. Инструменты: SQL, Excel, Tableau/Power BI, Python (pandas). Модели не обучает.</li>
  <li><strong>Data Scientist</strong> — строит предсказательные модели, проводит эксперименты. Сочетает математику, статистику и программирование. Инструменты: Python/R, scikit-learn, Jupyter, статистические методы.</li>
  <li><strong>Data Engineer</strong> — строит и поддерживает инфраструктуру для данных: пайплайны ETL, хранилища, стриминг. Инструменты: Spark, Airflow, Kafka, SQL, облачные платформы (AWS/GCP).</li>
  <li><strong>ML Engineer</strong> — переводит модели Data Scientist'а в production: оптимизирует, контейнеризирует, мониторит. Инструменты: Docker, Kubernetes, FastAPI, MLflow, CI/CD.</li>
</ul>
<p><span class="tag tag-tip">Упрощение</span> В малых командах один человек может совмещать несколько ролей.</p>`
      },
      {
        q: "Почему подготовка данных занимает до 80% времени в типичном проекте? Какие виды проблем с данными могут встретиться?",
        a: `<p>Данные из реального мира редко бывают «чистыми». Сбор происходит из разных источников (CRM, веб, ERP), каждый со своей логикой, форматами и ошибками.</p>
<p><strong>Типичные проблемы:</strong></p>
<ul>
  <li><strong>Пропущенные значения (NaN)</strong> — клиент не заполнил поле, сбой при передаче.</li>
  <li><strong>Дубликаты</strong> — один и тот же заказ попал в базу дважды.</li>
  <li><strong>Выбросы (outliers)</strong> — зарплата 999 999 999 руб. из-за ошибки ввода.</li>
  <li><strong>Несогласованность форматов</strong> — дата «01.01.2024» и «2024-01-01» в одном столбце.</li>
  <li><strong>Неправильные типы данных</strong> — числа хранятся как строки.</li>
  <li><strong>Смещение (bias)</strong> — данные собраны нерепрезентативно (только активные пользователи).</li>
  <li><strong>Утечка данных (data leakage)</strong> — в признаках присутствует информация из будущего.</li>
</ul>
<p>80% времени — это не слабость аналитиков, а объективная сложность реальных данных.</p>`
      }
    ]
  },
  {
    section: 2,
    title: "Раздел 2. Инструменты и технологии",
    questions: [
      {
        q: "Зачем в Python для анализа данных используется NumPy? Что такое векторизованные операции и почему они быстрее циклов?",
        a: `<p><strong>NumPy</strong> — библиотека для работы с многомерными числовыми массивами. Ключевое преимущество: реализована на C и Fortran, что даёт скорость на уровне компилируемых языков.</p>
<p><strong>Векторизация</strong> — применение операции ко всему массиву сразу, без явного цикла на уровне Python:</p>
<pre>import numpy as np
a = np.array([1, 2, 3, 4])
b = a * 2          # векторизованная операция
# vs
b = [x * 2 for x in a]   # цикл Python</pre>
<p>Цикл Python медленный потому, что каждая итерация: 1) проверяет тип объекта, 2) вызывает метод __mul__, 3) выделяет память под новый объект. NumPy выполняет всё в одном быстром вызове на C без overhead интерпретатора. Разница в скорости — от 10 до 1000 раз.</p>`
      },
      {
        q: "Сравните Series и DataFrame в pandas. Как создать DataFrame из словаря списков и выполнить фильтрацию строк?",
        a: `<p><strong>Series</strong> — одномерный массив с метками (индексом). Аналог столбца таблицы.</p>
<p><strong>DataFrame</strong> — двумерная таблица: коллекция Series с общим индексом.</p>
<pre>import pandas as pd

# Создание из словаря списков
df = pd.DataFrame({
    'имя': ['Анна', 'Борис', 'Вера'],
    'возраст': [25, 32, 28],
    'город': ['Москва', 'СПб', 'Москва']
})

# Фильтрация — булево индексирование
москвичи = df[df['город'] == 'Москва']

# Составное условие
молодые_москвичи = df[(df['город'] == 'Москва') & (df['возраст'] < 30)]

# Метод query (удобнее для сложных условий)
result = df.query("город == 'Москва' and возраст < 30")</pre>`
      },
      {
        q: "Какие типы ячеек бывают в Jupyter Notebook? Для чего используются магические команды?",
        a: `<p><strong>Типы ячеек:</strong></p>
<ul>
  <li><strong>Code</strong> — исполняемый код (Python, R и др.)</li>
  <li><strong>Markdown</strong> — текст, заголовки, формулы LaTeX, списки.</li>
  <li><strong>Raw</strong> — неформатированный текст, не выполняется и не рендерится (используется для nbconvert).</li>
</ul>
<p><strong>Магические команды</strong> — специальные директивы ядра IPython, начинающиеся с <code>%</code> (line magic) или <code>%%</code> (cell magic):</p>
<ul>
  <li><code>%time</code> — измеряет время выполнения одной строки.</li>
  <li><code>%timeit</code> — многократный замер для точной оценки.</li>
  <li><code>%matplotlib inline</code> — отображать графики прямо в ноутбуке.</li>
  <li><code>%%writefile file.py</code> — сохранить содержимое ячейки в файл.</li>
  <li><code>%who</code> / <code>%whos</code> — список переменных в пространстве имён.</li>
  <li><code>!ls</code> — выполнить команду оболочки.</li>
</ul>`
      },
      {
        q: "Что такое Git и GitHub? Опишите базовый алгоритм: инициализация, добавление файлов, коммит, отправка на удалённый репозиторий.",
        a: `<p><strong>Git</strong> — система контроля версий: сохраняет историю изменений файлов локально.</p>
<p><strong>GitHub</strong> — облачный хостинг Git-репозиториев + инструменты для совместной работы (pull requests, issues, actions).</p>
<pre># 1. Инициализация нового репозитория
git init my_project
cd my_project

# 2. Добавление файлов в индекс (staging area)
git add notebook.ipynb        # конкретный файл
git add .                     # все изменённые файлы

# 3. Создание коммита с описанием
git commit -m "Добавил EDA-ноутбук с анализом оттока"

# 4. Привязка удалённого репозитория
git remote add origin https://github.com/user/my_project.git

# 5. Отправка на GitHub
git push -u origin main</pre>
<p>Последующие изменения: <code>git add . → git commit -m "..." → git push</code></p>`
      },
      {
        q: "Какие меры безопасности необходимо соблюдать при работе с Git на общем компьютере? Что такое Personal Access Token и почему нельзя использовать пароль?",
        a: `<p>GitHub отключил аутентификацию по паролю через HTTPS в 2021 году, так как пароли легко перехватить и они дают полный доступ к аккаунту.</p>
<p><strong>Personal Access Token (PAT)</strong> — это специальная строка-заместитель пароля, которая:</p>
<ul>
  <li>имеет ограниченные разрешения (scope): только репозитории, только чтение и т.д.</li>
  <li>может быть в любой момент отозвана без смены пароля;</li>
  <li>имеет срок действия;</li>
  <li>не раскрывает основной пароль при компрометации.</li>
</ul>
<p><strong>Меры безопасности на общем компьютере:</strong></p>
<ul>
  <li>Не сохранять учётные данные в Git credential store (<code>git config --global credential.helper</code> — осторожно).</li>
  <li>После работы: <code>git config --global --unset credential.helper</code>.</li>
  <li>Никогда не коммитить файлы с секретами (API-ключи, пароли) — использовать <code>.gitignore</code> и файл <code>.env</code>.</li>
  <li>Использовать SSH-ключи вместо HTTPS, если компьютер личный.</li>
</ul>`
      },
      {
        q: "Назовите основные методы работы с пропущенными значениями в pandas. Когда удалить строку, а когда — заполнить пропуск?",
        a: `<pre>df.isnull().sum()          # подсчёт пропусков по столбцам
df.dropna()               # удалить строки с любым NaN
df.dropna(subset=['age']) # удалить строки только если NaN в 'age'
df['age'].fillna(df['age'].median())  # заполнить медианой
df.fillna(method='ffill')             # forward fill (временные ряды)
df.fillna(method='bfill')             # backward fill</pre>
<p><strong>Когда удалять строку:</strong></p>
<ul>
  <li>Пропусков мало (&lt;5% строк) и они случайны (MCAR).</li>
  <li>Значение является целевой переменной (y).</li>
  <li>Пропуск несёт информацию: «заполнено = другой статус».</li>
</ul>
<p><strong>Когда заполнять:</strong></p>
<ul>
  <li>Данных мало — удаление критично для модели.</li>
  <li>Пропуск не случаен (MAR/MNAR) — удаление вносит смещение.</li>
  <li>Временные ряды — интерполяция или forward fill логичны.</li>
</ul>`
      },
      {
        q: "Объясните разницу между методами loc[] и iloc[] в pandas. Приведите примеры использования каждого.",
        a: `<p><strong><code>loc[]</code></strong> — доступ по <em>меткам</em> (label-based): использует имена строк и столбцов.</p>
<p><strong><code>iloc[]</code></strong> — доступ по <em>позиции</em> (integer-based): использует числовые индексы 0, 1, 2…</p>
<pre>df = pd.DataFrame({'A': [10,20,30], 'B': [40,50,60]},
                   index=['x','y','z'])

# loc — по меткам
df.loc['y', 'B']          # → 50
df.loc['x':'y', 'A':'B']  # строки x до y включительно

# iloc — по позициям
df.iloc[1, 1]             # → 50
df.iloc[0:2, 0:2]         # строки 0,1 (не включая 2)
df.iloc[-1]               # последняя строка</pre>
<p><span class="tag tag-warn">Важно</span> У <code>loc</code> правый конец среза <strong>включительно</strong>, у <code>iloc</code> — <strong>исключительно</strong> (как в стандартном Python).</p>`
      },
      {
        q: "Зачем в анализе данных используется SQL? Напишите запрос: все заказы клиента id=5, сортировка по дате, первые 10.",
        a: `<p><strong>SQL</strong> незаменим в DS потому, что:</p>
<ul>
  <li>данные хранятся в реляционных БД (PostgreSQL, MySQL, BigQuery);</li>
  <li>позволяет делать агрегации и джойны прямо на сервере — не нужно грузить гигабайты в память;</li>
  <li>понятен бизнесу и аналитикам, не только инженерам.</li>
</ul>
<pre>SELECT
    order_id,
    order_date,
    total_amount,
    status
FROM orders
WHERE client_id = 5
ORDER BY order_date ASC
LIMIT 10;</pre>
<p>Для сложных задач: оконные функции (<code>ROW_NUMBER() OVER</code>), CTE (<code>WITH ... AS</code>), подзапросы — всё это позволяет формулировать аналитические запросы без переноса данных в Python.</p>`
      }
    ]
  },
  {
    section: 3,
    title: "Раздел 3. Разведочный анализ и визуализация",
    questions: [
      {
        q: "Что такое разведочный анализ данных (EDA)? Какие задачи он решает и почему проводится перед моделированием?",
        a: `<p><strong>EDA (Exploratory Data Analysis)</strong> — итерационный процесс исследования данных с помощью статистик и визуализаций <em>до</em> построения формальных моделей.</p>
<p><strong>Задачи EDA:</strong></p>
<ul>
  <li>Понять форму и размер данных: количество строк, столбцов, типы.</li>
  <li>Найти пропуски, дубликаты, аномалии.</li>
  <li>Изучить распределения признаков (нормальное? скошенное? бимодальное?)</li>
  <li>Выявить корреляции между переменными.</li>
  <li>Сформулировать гипотезы для моделирования.</li>
</ul>
<p><strong>Почему перед моделированием:</strong> если не понять данные, модель будет обучена на «мусоре». Например, не замеченный выброс в целевой переменной исказит всю регрессию. EDA — это «знакомство с данными» перед принятием любых решений.</p>`
      },
      {
        q: "Объясните назначение гистограммы, boxplot и scatter plot. Для каждого — пример бизнес-задачи.",
        a: `<p><strong>Гистограмма (histogram)</strong> — показывает распределение одной числовой переменной: где сосредоточены значения, есть ли хвосты, мультимодальность.</p>
<p>Бизнес-пример: распределение возраста покупателей — помогает понять основные клиентские сегменты.</p>

<p><strong>Ящик с усами (boxplot)</strong> — показывает медиану, квартили (Q1, Q3), IQR и выбросы. Удобен для сравнения нескольких групп.</p>
<p>Бизнес-пример: сравнение времени доставки по регионам — сразу видно, где есть выбросы и отличается ли медиана.</p>

<p><strong>Диаграмма рассеяния (scatter plot)</strong> — отображает связь между двумя числовыми переменными.</p>
<p>Бизнес-пример: зависимость выручки от маркетингового бюджета — можно визуально оценить, есть ли линейная связь, и выявить аномалии.</p>`
      },
      {
        q: "Как с помощью Seaborn и Matplotlib построить корреляционную матрицу и heatmap? Как интерпретировать значения корреляции?",
        a: `<pre>import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Вычислить матрицу корреляций
corr_matrix = df.corr(numeric_only=True)

# Визуализировать тепловой картой
plt.figure(figsize=(10, 8))
sns.heatmap(
    corr_matrix,
    annot=True,        # показать числа
    fmt=".2f",         # 2 знака после запятой
    cmap='coolwarm',   # цветовая схема
    vmin=-1, vmax=1,
    linewidths=0.5
)
plt.title("Корреляционная матрица")
plt.tight_layout()
plt.show()</pre>
<p><strong>Интерпретация (Пирсон):</strong></p>
<ul>
  <li><strong>+1.0</strong> — идеальная прямая связь.</li>
  <li><strong>0.7–0.9</strong> — сильная положительная корреляция.</li>
  <li><strong>0.3–0.7</strong> — умеренная.</li>
  <li><strong>0</strong> — нет линейной связи.</li>
  <li><strong>Отрицательные</strong> значения — обратная связь.</li>
</ul>
<p><span class="tag tag-warn">Осторожно</span> Корреляция ≠ причинно-следственная связь. Диагональ всегда равна 1.</p>`
      },
      {
        q: "Что такое «ложная корреляция»? Приведите пример из реальной жизни.",
        a: `<p><strong>Ложная (spurious) корреляция</strong> — статистически значимая связь между двумя переменными, не обусловленная прямым причинно-следственным механизмом. Обычно возникает из-за <em>скрытого третьего фактора</em> (confounder) или случайного совпадения.</p>
<p><strong>Классический пример:</strong> количество утонувших в бассейне коррелирует с кассовыми сборами фильмов с Николасом Кейджем. Оба ряда просто растут в похожие периоды — общая причина (лето, досуг), а не прямая связь.</p>
<p><strong>Пример из DS:</strong> в данных e-commerce пользователи, которые смотрели больше страниц, покупали больше. Но если убрать фактор «намерение купить» — связь пропадает: покупатели с намерением и смотрят больше, и покупают.</p>
<p><strong>Вывод:</strong> корреляция — повод для гипотезы, но не доказательство. Нужен причинно-следственный анализ (A/B-тесты, инструментальные переменные).</p>`
      },
      {
        q: "Сравните библиотеки Matplotlib и Seaborn. В чём преимущества каждой? Когда использовать одну, а когда — другую?",
        a: `<p><strong>Matplotlib</strong> — низкоуровневая библиотека, «холст» для любых графиков. Полный контроль над каждым элементом.</p>
<p>Преимущества: максимальная гибкость, множество типов графиков, fine-tuning любого элемента, поддержка subplots, интерактивных бэкендов.</p>

<p><strong>Seaborn</strong> — высокоуровневая обёртка над Matplotlib, ориентированная на статистическую визуализацию и работу с DataFrame.</p>
<p>Преимущества: красивые стили по умолчанию, встроенные статистические агрегации, легко строить heatmap, violin plot, pairplot, facet grid.</p>

<p><strong>Когда что использовать:</strong></p>
<ul>
  <li>Seaborn — быстрый EDA, красивые статистические графики из DataFrame в 1–2 строки.</li>
  <li>Matplotlib — тонкая настройка, нестандартные типы графиков, публикационные рисунки, анимации.</li>
  <li>Часто совмещают: строят в Seaborn, дотягивают через Matplotlib API (<code>plt.title()</code>, <code>ax.set_xlim()</code>).</li>
</ul>`
      },
      {
        q: "Как выбрать тип графика для: (а) временного ряда, (б) распределения одной переменной, (в) сравнения категориальных групп?",
        a: `<p><strong>(а) Временной ряд</strong> → <em>линейный график (line plot)</em>.</p>
<p>Показывает тренд, сезонность, резкие изменения. Ось X — время, ось Y — значение. Можно наложить несколько рядов для сравнения. Альтернатива: <em>area chart</em> для нескольких рядов с совокупным значением.</p>

<p><strong>(б) Распределение одной переменной</strong> → <em>гистограмма (histogram)</em> или <em>KDE-график</em>.</p>
<p>Гистограмма — дискретные бины, быстро видны моды и хвосты. KDE — сглаженная версия. Boxplot — если нужно акцентировать выбросы и квартили, а не форму распределения.</p>

<p><strong>(в) Сравнение нескольких категориальных групп</strong> → <em>bar chart (столбчатая диаграмма)</em>.</p>
<p>Для числовых метрик по категориям (средняя выручка по регионам). Если важно распределение — <em>boxplot</em> или <em>violin plot</em> по категориям. Если доли от целого — <em>pie chart</em> (только для &lt;5 категорий).</p>`
      }
    ]
  },
  {
    section: 4,
    title: "Раздел 4. Машинное обучение",
    questions: [
      {
        q: "В чём разница между задачами регрессии и классификации? По два примера из разных областей.",
        a: `<p><strong>Регрессия</strong> — предсказание <em>непрерывного</em> числового значения.</p>
<ul>
  <li>Недвижимость: предсказание цены квартиры по площади, этажу, локации.</li>
  <li>Медицина: прогноз уровня глюкозы в крови через 2 часа.</li>
</ul>
<p><strong>Классификация</strong> — предсказание <em>дискретной метки</em> (класса).</p>
<ul>
  <li>Банки: спам или не спам (бинарная классификация).</li>
  <li>Медицина: диагностика — какой из 5 видов опухоли (мультиклассовая).</li>
</ul>
<p>Основное отличие: в регрессии ответ — число, в классификации — категория. Некоторые алгоритмы решают обе задачи (дерево решений, Random Forest, нейросети), другие специализированы (линейная/логистическая регрессия).</p>`
      },
      {
        q: "Что такое overfitting и underfitting? Как распознать по графикам? Методы борьбы с переобучением.",
        a: `<p><strong>Overfitting (переобучение)</strong> — модель «зазубрила» обучающие данные, включая шум, и плохо обобщается на новые. График: низкий train error, высокий validation error.</p>
<p><strong>Underfitting (недообучение)</strong> — модель слишком проста, не улавливает паттерны. График: высокий train error И высокий validation error.</p>
<p><strong>Идеал</strong> — «сладкое место» между ними: оба error низкие и близки друг к другу.</p>
<p><strong>Методы борьбы с переобучением:</strong></p>
<ul>
  <li><strong>Регуляризация</strong> — L1 (Lasso) обнуляет признаки, L2 (Ridge) штрафует большие коэффициенты.</li>
  <li><strong>Кроссвалидация</strong> — более честная оценка обобщающей способности.</li>
  <li><strong>Ранняя остановка</strong> (early stopping) — для градиентных алгоритмов.</li>
  <li><strong>Dropout</strong> — для нейросетей.</li>
  <li><strong>Больше данных</strong> — лучший способ при наличии.</li>
  <li><strong>Упрощение модели</strong> — меньше глубина дерева, меньше признаков.</li>
</ul>`
      },
      {
        q: "Объясните принцип работы линейной регрессии. Как интерпретировать коэффициенты модели?",
        a: `<p>Линейная регрессия предполагает, что целевая переменная является <em>линейной комбинацией</em> признаков:</p>
<pre>ŷ = β₀ + β₁·x₁ + β₂·x₂ + ... + βₙ·xₙ</pre>
<p>Обучение — нахождение коэффициентов β, минимизирующих среднеквадратичную ошибку (MSE) по обучающей выборке. Аналитическое решение: метод наименьших квадратов (OLS). Итерационное: градиентный спуск.</p>
<p><strong>Интерпретация коэффициентов:</strong></p>
<ul>
  <li><code>β₀</code> (intercept) — предсказанное значение при всех признаках = 0.</li>
  <li><code>βᵢ</code> — при увеличении <code>xᵢ</code> на 1 единицу ŷ изменяется на <code>βᵢ</code>, при <em>фиксированных остальных признаках</em>.</li>
</ul>
<p>Пример: модель цены квартиры. β₁ = 50 для «площадь (м²)» означает: каждый дополнительный м² добавляет 50 тыс. руб. к цене при прочих равных.</p>
<p><span class="tag tag-note">Важно</span> Коэффициенты не сравнимы по величине, если признаки в разных масштабах — нужна стандартизация.</p>`
      },
      {
        q: "Что такое логистическая регрессия? Почему она называется «регрессией»? Роль сигмоидной функции.",
        a: `<p>Логистическая регрессия — алгоритм <em>бинарной классификации</em>, который предсказывает <em>вероятность</em> принадлежности к классу 1.</p>
<p><strong>Почему «регрессия»:</strong> исторически — метод вырос из линейной регрессии, а математически он всё ещё регрессирует линейную комбинацию признаков, только на логиты. Это компромисс между простотой и историей названия.</p>
<p><strong>Роль сигмоиды (σ):</strong></p>
<pre>σ(z) = 1 / (1 + e^(−z))

z = β₀ + β₁·x₁ + ... — линейная комбинация
P(y=1|x) = σ(z)      — вероятность класса 1</pre>
<p>Сигмоида «сжимает» любое вещественное число z в диапазон (0, 1), превращая его в вероятность. При z=0 → P=0.5 (граница решения). Порог обычно 0.5: если P &gt; 0.5, предсказывается класс 1.</p>`
      },
      {
        q: "Как работает алгоритм k-NN? Как выбор k влияет на качество и переобучение?",
        a: `<p><strong>k-Nearest Neighbors (k-NN)</strong> — «ленивый» алгоритм: не строит явную модель при обучении, а просто запоминает все обучающие точки.</p>
<p><strong>Принцип работы для классификации:</strong></p>
<ol>
  <li>Для нового объекта найти k ближайших соседей в обучающей выборке (по евклидову расстоянию или другой метрике).</li>
  <li>Предсказать класс голосованием большинства среди k соседей.</li>
</ol>
<p><strong>Влияние k:</strong></p>
<ul>
  <li><strong>k=1</strong> — идеальное запоминание, высокое переобучение, нестабильные границы решений.</li>
  <li><strong>Маленькое k</strong> — сложные, «зубчатые» границы, чувствительность к шуму.</li>
  <li><strong>Большое k</strong> — гладкие границы, возможное недообучение, игнорирование локальных паттернов.</li>
  <li>Оптимальное k выбирают кроссвалидацией, часто нечётное (для избегания ничьих).</li>
</ul>
<p><span class="tag tag-warn">Минус</span> Медленный на больших данных (O(n) на каждое предсказание), требует масштабирования признаков.</p>`
      },
      {
        q: "Опишите принцип построения дерева решений. Какие критерии разбиения используются?",
        a: `<p>Дерево решений строится <em>жадно</em> (top-down): на каждом шаге выбирается то разбиение, которое максимально «очищает» узел.</p>
<p><strong>Алгоритм (CART):</strong></p>
<ol>
  <li>Для каждого признака и каждого возможного порога вычислить критерий «нечистоты» после разбиения.</li>
  <li>Выбрать признак и порог с наименьшей нечистотой (наибольшим информационным приростом).</li>
  <li>Создать два дочерних узла, повторить рекурсивно.</li>
  <li>Остановиться при достижении max_depth или min_samples_leaf.</li>
</ol>
<p><strong>Критерии разбиения:</strong></p>
<ul>
  <li><strong>Энтропия Шеннона</strong> — H = −Σ pᵢ·log₂(pᵢ). Максимальна при равном распределении классов (0.5/0.5 для двух классов). Используется в ID3, C4.5.</li>
  <li><strong>Критерий Джини (Gini impurity)</strong> — G = 1 − Σ pᵢ². Менее вычислительно затратен, используется в CART (scikit-learn). Интерпретация: вероятность неправильной классификации случайно выбранного элемента.</li>
  <li><strong>Дисперсия (для регрессии)</strong> — минимизировать MSE в узле.</li>
</ul>`
      },
      {
        q: "Что такое Random Forest? Почему он лучше одного дерева и как уменьшает дисперсию?",
        a: `<p><strong>Random Forest (случайный лес)</strong> — ансамблевый метод из N деревьев решений, обученных на разных подвыборках данных.</p>
<p><strong>Два механизма рандомизации:</strong></p>
<ul>
  <li><strong>Bootstrap sampling</strong> — каждое дерево обучается на случайной выборке с возвращением (~63% уникальных объектов).</li>
  <li><strong>Random feature selection</strong> — при каждом разбиении узла рассматривается случайное подмножество признаков (обычно √p для классификации).</li>
</ul>
<p><strong>Предсказание</strong> — усреднение (регрессия) или голосование большинства (классификация) по всем деревьям.</p>
<p><strong>Почему лучше одного дерева:</strong></p>
<p>Одно дерево имеет высокую дисперсию — чувствительно к конкретной обучающей выборке. Усреднение многих независимых деревьев снижает дисперсию без значимого роста смещения (закон больших чисел). Это суть метода <em>bagging</em> (bootstrap aggregating).</p>`
      },
      {
        q: "Назовите основные метрики для регрессии (MSE, MAE, R²). Как интерпретировать R²? Когда MAE лучше MSE?",
        a: `<pre>MAE  = (1/n) · Σ |yᵢ − ŷᵢ|         # средняя абсолютная ошибка
MSE  = (1/n) · Σ (yᵢ − ŷᵢ)²         # среднеквадратичная ошибка
RMSE = √MSE                           # то же, но в исходных единицах
R²   = 1 − MSE / Var(y)              # коэффициент детерминации</pre>
<p><strong>Интерпретация R²:</strong></p>
<ul>
  <li>R² = 1 — идеальная модель (все предсказания точны).</li>
  <li>R² = 0 — модель не лучше предсказания среднего.</li>
  <li>R² < 0 — модель хуже среднего (возможно на тестовых данных).</li>
  <li>R² = 0.85 — модель объясняет 85% дисперсии целевой переменной.</li>
</ul>
<p><strong>MAE vs MSE:</strong></p>
<ul>
  <li><strong>MAE</strong> предпочтительнее, когда в данных есть выбросы — MSE штрафует квадратично, MAE линейно. Например, прогноз цен на жильё с редкими элитными объектами.</li>
  <li><strong>MSE/RMSE</strong> — когда большие ошибки особенно недопустимы: медицинские прогнозы, управление, где критичны единичные крупные отклонения.</li>
</ul>`
      },
      {
        q: "Объясните метрики классификации: accuracy, precision, recall, F1-score. Пример, где precision важнее recall, и наоборот.",
        a: `<pre>Accuracy  = (TP + TN) / (TP + TN + FP + FN)
Precision = TP / (TP + FP)   — из предсказанных «+», сколько правда «+»
Recall    = TP / (TP + FN)   — из реальных «+», сколько нашли
F1-score  = 2 · Prec · Rec / (Prec + Rec)   — гармоническое среднее</pre>
<p><strong>Precision важнее recall:</strong> <em>спам-фильтр</em>. Лучше пропустить спам, чем удалить важное письмо клиента. FP (важное письмо в спаме) — дорогая ошибка.</p>
<p><strong>Recall важнее precision:</strong> <em>диагностика рака</em>. Лучше «переназначить» анализы (FP = лишняя биопсия), чем пропустить болезнь (FN = нераспознанный рак). Цена FN — жизнь пациента.</p>
<p><span class="tag tag-note">Совет</span> Accuracy бесполезна при несбалансированных классах (99% негативных → тривиальная модель «всегда 0» имеет accuracy 99%).</p>`
      },
      {
        q: "Что такое матрица ошибок (confusion matrix)? Как вычислить recall и specificity?",
        a: `<p>Confusion matrix — таблица 2×2 (для бинарной классификации):</p>
<pre>               Предсказано: +   Предсказано: −
Реально: +    TP (истинно+)    FN (ложно−)
Реально: −    FP (ложно+)      TN (истинно−)</pre>
<p><strong>Recall (чувствительность, Sensitivity, TPR):</strong></p>
<pre>Recall = TP / (TP + FN)
«Из всех реально больных — сколько модель нашла?»</pre>
<p><strong>Specificity (специфичность, TNR):</strong></p>
<pre>Specificity = TN / (TN + FP)
«Из всех реально здоровых — сколько модель правильно отклонила?»</pre>
<p>Пример: 100 больных, 100 здоровых. Модель нашла 80 больных (TP=80, FN=20) и правильно отклонила 90 здоровых (TN=90, FP=10).</p>
<pre>Recall = 80 / (80+20) = 0.80
Specificity = 90 / (90+10) = 0.90</pre>`
      },
      {
        q: "Как работает GridSearchCV? Что такое кроссвалидация и зачем она нужна?",
        a: `<p><strong>Кроссвалидация (K-Fold CV)</strong> — метод оценки модели: данные разбиваются на K частей (folds). Модель обучается K раз, каждый раз используя K-1 фолдов для обучения и 1 для валидации. Финальная метрика — среднее по K итерациям.</p>
<p>Зачем: один train/test split ненадёжен — зависит от конкретного разбиения. CV даёт более устойчивую оценку обобщающей способности.</p>
<p><strong>GridSearchCV</strong> — перебирает все комбинации гиперпараметров и для каждой проводит кроссвалидацию:</p>
<pre>from sklearn.model_selection import GridSearchCV
from sklearn.ensemble import RandomForestClassifier

param_grid = {
    'n_estimators': [50, 100, 200],
    'max_depth': [3, 5, None],
    'min_samples_leaf': [1, 5]
}

gs = GridSearchCV(
    RandomForestClassifier(),
    param_grid,
    cv=5,           # 5-fold CV
    scoring='f1',
    n_jobs=-1       # все ядра
)
gs.fit(X_train, y_train)
print(gs.best_params_)  # лучшие параметры</pre>`
      },
      {
        q: "Как в Random Forest оценивается важность признаков? Как визуализировать и интерпретировать?",
        a: `<p>В Random Forest важность признака — <strong>среднее уменьшение нечистоты (MDI)</strong> по всем деревьям и всем разбиениям, где используется этот признак.</p>
<p>При каждом разбиении в узле фиксируется улучшение критерия (Gini/энтропия). Важность признака = сумма этих улучшений, усреднённая по деревьям, нормированная на [0,1].</p>
<pre>import matplotlib.pyplot as plt
import pandas as pd

model.fit(X_train, y_train)

importances = pd.Series(
    model.feature_importances_,
    index=X_train.columns
).sort_values(ascending=False)

importances.plot(kind='bar', figsize=(10, 5), color='steelblue')
plt.title("Важность признаков (Random Forest)")
plt.tight_layout()
plt.show()</pre>
<p><strong>Интерпретация:</strong> признак с importances=0.35 «отвечает» за ~35% качества разбиений в лесу. Признаки с низкими значениями (<0.01) можно рассмотреть для исключения.</p>
<p><span class="tag tag-warn">Осторожно</span> MDI завышает важность признаков с большим числом уникальных значений. Альтернатива: Permutation Importance.</p>`
      }
    ]
  },
  {
    section: 5,
    title: "Раздел 5. Предобработка и этические аспекты",
    questions: [
      {
        q: "Какие виды «грязных» данных встречаются? Стратегии обработки дубликатов, пропусков и выбросов.",
        a: `<p><strong>Виды проблем:</strong> пропуски, дубликаты, выбросы, неправильные типы, несогласованные форматы, противоречивые значения, устаревшие данные.</p>
<p><strong>Дубликаты:</strong></p>
<pre>df.duplicated().sum()         # количество дублей
df.drop_duplicates(inplace=True)
# Частичные дубли (по ключевым столбцам):
df.drop_duplicates(subset=['client_id', 'date'])</pre>
<p><strong>Пропуски</strong> — три стратегии:</p>
<ul>
  <li>Удаление строк/столбцов (если пропусков &gt;50%).</li>
  <li>Заполнение: медиана/мода для числовых, наиболее частое для категориальных.</li>
  <li>Импутация: KNN-импутация, модельная (предсказать пропуск по другим признакам).</li>
</ul>
<p><strong>Выбросы</strong>:</p>
<ul>
  <li>Метод IQR: удалить/заменить значения вне [Q1−1.5·IQR, Q3+1.5·IQR].</li>
  <li>Z-score: удалить |z| &gt; 3.</li>
  <li>Winsorization: заменить выбросы граничными значениями (не удалять строку).</li>
</ul>`
      },
      {
        q: "Что такое IQR и как с его помощью выявлять выбросы? Числовой пример.",
        a: `<p><strong>IQR (Interquartile Range, межквартильный размах)</strong> = Q3 − Q1, где Q1 — 25-й перцентиль, Q3 — 75-й перцентиль.</p>
<p><strong>Правило выброса:</strong> значение считается выбросом, если оно выходит за пределы «заборов»:</p>
<pre>Нижняя граница = Q1 − 1.5 · IQR
Верхняя граница = Q3 + 1.5 · IQR</pre>
<p><strong>Числовой пример:</strong> данные о зарплатах (тыс. руб.): [30, 35, 40, 42, 45, 48, 50, 55, 120]</p>
<pre>Q1 = 38.5    Q3 = 51.5
IQR = 51.5 − 38.5 = 13.0

Нижняя граница = 38.5 − 1.5·13 = 19.0
Верхняя граница = 51.5 + 1.5·13 = 71.0

Значение 120 > 71 → выброс ✓</pre>
<pre>import numpy as np
Q1 = np.percentile(data, 25)
Q3 = np.percentile(data, 75)
IQR = Q3 - Q1
outliers = data[(data < Q1 - 1.5*IQR) | (data > Q3 + 1.5*IQR)]</pre>`
      },
      {
        q: "В чём разница между нормализацией (min-max) и стандартизацией (StandardScaler)? Когда применять?",
        a: `<pre># Min-Max Normalization → диапазон [0, 1]
x_norm = (x − x_min) / (x_max − x_min)

from sklearn.preprocessing import MinMaxScaler
scaler = MinMaxScaler()
X_norm = scaler.fit_transform(X_train)</pre>
<pre># Standardization (Z-score) → среднее=0, std=1
x_std = (x − μ) / σ

from sklearn.preprocessing import StandardScaler
scaler = StandardScaler()
X_std = scaler.fit_transform(X_train)</pre>
<p><strong>Когда применять:</strong></p>
<ul>
  <li><strong>Min-Max</strong> — нейронные сети (диапазон активаций), когда важен точный диапазон [0,1]. Чувствителен к выбросам (один выброс сожмёт все остальные значения).</li>
  <li><strong>StandardScaler</strong> — линейная регрессия, SVM, PCA, k-NN. Робастнее к выбросам. Не гарантирует фиксированный диапазон.</li>
  <li>Деревья решений и Random Forest — <em>не нуждаются</em> в масштабировании (инвариантны к монотонным преобразованиям).</li>
</ul>
<p><span class="tag tag-warn">Важно</span> Всегда fit только на train, transform на train и test — иначе утечка данных.</p>`
      },
      {
        q: "Что такое кодирование категориальных признаков? Label Encoding vs One-Hot Encoding — когда что применять?",
        a: `<p>Большинство ML-алгоритмов работают только с числами. Категориальные признаки (строки) нужно преобразовать.</p>
<p><strong>Label Encoding</strong> — каждой категории присваивается целое число (0, 1, 2...):</p>
<pre>from sklearn.preprocessing import LabelEncoder
le = LabelEncoder()
df['color_enc'] = le.fit_transform(df['color'])
# красный→0, зелёный→1, синий→2</pre>
<p><em>Проблема</em>: алгоритм может интерпретировать числа как порядок или расстояние (зелёный «между» красным и синим). Подходит только для <strong>порядковых</strong> признаков (малый, средний, большой) или деревьев.</p>

<p><strong>One-Hot Encoding</strong> — каждая категория → отдельный бинарный столбец:</p>
<pre>pd.get_dummies(df, columns=['color'])
# color_красный | color_зелёный | color_синий</pre>
<p>Нет ложного упорядочивания. Применять для <strong>номинальных</strong> признаков (цвет, страна, тип). Минус: «проклятие размерности» при многих категориях (&gt;50 уникальных).</p>`
      },
      {
        q: "Как создать новый признак (feature engineering)? Два примера: числовой и текстовый/временной.",
        a: `<p><strong>Feature engineering</strong> — создание новых информативных признаков на основе имеющихся для улучшения модели.</p>
<p><strong>Пример 1 — числовой:</strong> из данных о доходах и расходах клиента вывести «финансовую нагрузку»:</p>
<pre>df['debt_ratio'] = df['monthly_debt'] / df['monthly_income']
# Один признак вместо двух, но более информативный для модели кредитного риска</pre>
<p><strong>Пример 2 — временной:</strong> из даты транзакции извлечь дополнительные признаки:</p>
<pre>df['date'] = pd.to_datetime(df['date'])
df['day_of_week'] = df['date'].dt.dayofweek   # 0=пн, 6=вс
df['hour'] = df['date'].dt.hour
df['is_weekend'] = df['day_of_week'].isin([5, 6]).astype(int)
df['month'] = df['date'].dt.month
# Важно для прогноза продаж: поведение в выходные отличается</pre>
<p><strong>Пример текстовый:</strong> длина отзыва, количество восклицательных знаков, TF-IDF признаки.</p>`
      },
      {
        q: "Какие этические проблемы возникают при работе с данными? Предвзятость, дискриминация, приватность (GDPR).",
        a: `<p><strong>1. Предвзятость данных (Bias)</strong> — если обучающие данные отражают исторические предрассудки, модель их воспроизводит и усиливает. Пример: система найма, обученная на исторических данных компании, где брали меньше женщин, будет дискриминировать их.</p>
<p><strong>2. Дискриминация моделей</strong> — модель систематически хуже работает для определённых групп (по расе, полу, возрасту). Пример: алгоритм кредитного скоринга, дающий более низкие баллы определённым этническим группам.</p>
<p><strong>3. Приватность и GDPR</strong>:</p>
<ul>
  <li>GDPR (General Data Protection Regulation) — европейский закон, требующий согласия на обработку персональных данных, права на удаление («право на забвение»), прозрачности алгоритмов.</li>
  <li>Анонимизация vs псевдонимизация: даже «обезличенные» данные часто можно деанонимизировать по комбинации признаков.</li>
  <li>Минимизация данных: собирать только то, что необходимо.</li>
</ul>
<p><strong>Практики этичного DS:</strong> аудит модели на fairness-метрики, разнообразие обучающих данных, объяснимость предсказаний (SHAP, LIME).</p>`
      },
      {
        q: "Что такое воспроизводимость результатов и как её обеспечить? Инструменты: окружения, requirements, random_state.",
        a: `<p><strong>Воспроизводимость (Reproducibility)</strong> — возможность получить те же результаты повторно: другим человеком, на другой машине, через год.</p>
<p><strong>Почему важно:</strong> без воспроизводимости невозможны: проверка результатов, деплой в production, сотрудничество в команде, peer review.</p>
<p><strong>Инструменты:</strong></p>
<ul>
  <li><strong>random_state / seed</strong> — фиксировать случайность:</li>
</ul>
<pre>import numpy as np, random
np.random.seed(42)
random.seed(42)
# В каждом алгоритме: random_state=42</pre>
<ul>
  <li><strong>requirements.txt / pyproject.toml</strong> — зафиксировать версии библиотек: <code>pip freeze > requirements.txt</code></li>
  <li><strong>Виртуальные окружения</strong>: <code>python -m venv env</code> или conda environments — изоляция зависимостей.</li>
  <li><strong>Git</strong> — версионирование кода и ноутбуков.</li>
  <li><strong>DVC (Data Version Control)</strong> — версионирование данных и моделей.</li>
  <li><strong>Docker</strong> — полная изоляция среды выполнения.</li>
  <li><strong>MLflow</strong> — логирование экспериментов: параметры, метрики, артефакты.</li>
</ul>`
      },
      {
        q: "Опишите полный цикл обработки данных на примере датасета Титаник или цены на жильё. От загрузки до сохранения очищенных данных.",
        a: `<p>Пример на датасете <strong>Titanic</strong>:</p>
<pre>import pandas as pd
import numpy as np

# 1. Загрузка
df = pd.read_csv('titanic.csv')
print(df.shape, df.dtypes)

# 2. Первичный анализ
print(df.head())
print(df.isnull().sum())
print(df.describe())

# 3. Обработка пропусков
df['Age'].fillna(df['Age'].median(), inplace=True)
df['Embarked'].fillna(df['Embarked'].mode()[0], inplace=True)
df.drop(columns=['Cabin'], inplace=True)  # >70% пропусков

# 4. Удаление дубликатов
df.drop_duplicates(inplace=True)

# 5. Удаление выбросов (Fare)
Q1 = df['Fare'].quantile(0.25)
Q3 = df['Fare'].quantile(0.75)
IQR = Q3 - Q1
df = df[df['Fare'] <= Q3 + 3 * IQR]  # мягкий порог для Fare

# 6. Feature Engineering
df['FamilySize'] = df['SibSp'] + df['Parch'] + 1
df['IsAlone'] = (df['FamilySize'] == 1).astype(int)

# 7. Кодирование категорий
df = pd.get_dummies(df, columns=['Sex', 'Embarked'], drop_first=True)

# 8. Удаление ненужных столбцов
df.drop(columns=['Name', 'Ticket', 'PassengerId'], inplace=True)

# 9. Сохранение
df.to_csv('titanic_clean.csv', index=False)
print("Готово:", df.shape)</pre>`
      }
    ]
  }
];

let openedCards = new Set();
let activeSection = 0; // 0 = все разделы

function renderAll() {
  const main = document.getElementById('main');
  main.innerHTML = '';
  let globalQNum = 0;
  data.forEach(section => {
    const secDiv = document.createElement('div');
    secDiv.className = 'section-block';
    secDiv.dataset.section = section.section;
    secDiv.innerHTML = `<div class="section-header">
      <div class="section-num">${section.section}</div>
      <div class="section-title">${section.title}</div>
    </div>`;
    section.questions.forEach(item => {
      globalQNum++;
      const card = document.createElement('div');
      card.className = 'qa-card';
      card.dataset.section = section.section;
      card.dataset.qnum = globalQNum;
      card.innerHTML = `
        <div class="qa-question" onclick="toggleCard(this)">
          <span class="q-num">№ ${globalQNum}</span>
          <span class="q-text">${escapeHtml(item.q)}</span>
          <span class="q-arrow">▼</span>
        </div>
        <div class="qa-answer">${item.a}</div>`;
      secDiv.appendChild(card);
    });
    main.appendChild(secDiv);
  });
  updateProgress();
  applyFilters();
}

function escapeHtml(str) {
  return str.replace(/[&<>]/g, function(m) {
    if (m === '&') return '&amp;';
    if (m === '<') return '&lt;';
    if (m === '>') return '&gt;';
    return m;
  });
}

function toggleCard(el) {
  const card = el.closest('.qa-card');
  card.classList.toggle('open');
  if (card.classList.contains('open')) openedCards.add(card.dataset.qnum);
  else openedCards.delete(card.dataset.qnum);
  updateProgress();
}

function updateProgress() {
  const total = document.querySelectorAll('.qa-card').length;
  const pct = total ? (openedCards.size / total) * 100 : 0;
  document.getElementById('progress').style.width = pct + '%';
}

function applyFilters() {
  const query = document.getElementById('searchInput').value.toLowerCase().trim();
  let visibleCount = 0;
  document.querySelectorAll('.qa-card').forEach(card => {
    const secMatch = (activeSection === 0) || (parseInt(card.dataset.section) === activeSection);
    const text = (card.querySelector('.q-text')?.textContent.toLowerCase() || '') +
                 (card.querySelector('.qa-answer')?.textContent.toLowerCase() || '');
    const textMatch = !query || text.includes(query);
    if (secMatch && textMatch) {
      card.classList.remove('hidden');
      visibleCount++;
    } else {
      card.classList.add('hidden');
    }
  });
  document.querySelectorAll('.section-block').forEach(sec => {
    const hasVisible = sec.querySelectorAll('.qa-card:not(.hidden)').length > 0;
    sec.style.display = hasVisible ? '' : 'none';
  });
  document.getElementById('noResults').style.display = visibleCount ? 'none' : 'block';
}

// Обработка выбора раздела (синхронизация между табами и select)
function setActiveSection(sectionNum, updateUi = true) {
  activeSection = sectionNum;
  if (updateUi) {
    // синхронизируем десктопные кнопки
    document.querySelectorAll('#desktopTabs .tab').forEach(btn => {
      const val = parseInt(btn.dataset.section);
      if (val === sectionNum) btn.classList.add('active');
      else btn.classList.remove('active');
    });
    // синхронизируем мобильный select
    const mobileSelect = document.getElementById('mobileSectionSelect');
    if (mobileSelect) mobileSelect.value = sectionNum;
  }
  applyFilters();
}

function initEventListeners() {
  // десктопные вкладки
  document.querySelectorAll('#desktopTabs .tab').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const sectionVal = parseInt(btn.dataset.section);
      setActiveSection(sectionVal, true);
    });
  });
  // мобильный селект
  const mobileSelect = document.getElementById('mobileSectionSelect');
  if (mobileSelect) {
    mobileSelect.addEventListener('change', (e) => {
      const val = parseInt(e.target.value);
      setActiveSection(val, true);
    });
  }
  // поиск с debounce для плавности
  const searchInput = document.getElementById('searchInput');
  let timeout;
  searchInput.addEventListener('input', () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => applyFilters(), 200);
  });
}

renderAll();
initEventListeners();
</script>
</body>
</html>