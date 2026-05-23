<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Полноценная система задач</title>
    <link rel="stylesheet" href="/crm/crm_style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <div class="header-top">
            <h1>🎯 CRM Pro</h1>
            <div class="header-actions">
                <button class="btn" id="themeToggle">🌙 Тёмная тема</button>
                <button class="btn" id="exportBtn">📊 Экспорт CSV</button>
                <button class="btn btn-primary" id="openParentModalBtn">➕ Создать проект</button>
            </div>
        </div>
        <div class="filters">
            <input type="text" id="searchInput" placeholder="🔍 Поиск...">
            <select id="filterAssignee"><option value="">Все исполнители</option></select>
            <select id="filterPriority"><option value="">Все приоритеты</option>
                <option value="critical">🔥 Критичный</option><option value="high">⚠️ Высокий</option>
                <option value="medium">📌 Средний</option><option value="low">✅ Низкий</option>
            </select>
        </div>
    </div>

    <div class="dashboard" id="dashboard"></div>
    <div class="board" id="kanbanBoard"></div>
    <footer>✨ Перетаскивай задачи | Статус можно менять через селект у каждой подзадачи</footer>
</div>

<!-- МОДАЛКА: СОЗДАНИЕ / РЕДАКТИРОВАНИЕ ПРОЕКТА -->
<div id="projectModal" class="modal">
    <div class="modal-content">
        <h2 id="projectModalTitle">📋 Новый проект</h2>
        <input type="text" id="projectTitle" placeholder="Название проекта">
        <input type="date" id="projectDeadline">
        <input type="text" id="projectAssignee" placeholder="Ответственный">
        <select id="projectPriority">
            <option value="medium">Средний приоритет</option>
            <option value="critical">Критичный</option><option value="high">Высокий</option><option value="low">Низкий</option>
        </select>
        <select id="projectTag">
            <option value="">Без метки</option><option value="bug">Баг</option>
            <option value="feature">Фича</option><option value="design">Дизайн</option><option value="backend">Бэкенд</option>
        </select>
        <textarea id="projectComment" rows="2" placeholder="Описание"></textarea>
        <input type="hidden" id="editProjectId">
        <div class="modal-buttons">
            <button class="cancel-modal" onclick="closeProjectModal()">Отмена</button>
            <button class="save-modal" id="saveProjectBtn">Сохранить</button>
        </div>
    </div>
</div>

<!-- МОДАЛКА: СОЗДАНИЕ / РЕДАКТИРОВАНИЕ ПОДЗАДАЧИ -->
<div id="subtaskModal" class="modal">
    <div class="modal-content">
        <h2 id="subtaskModalTitle">📝 Задача</h2>
        <input type="text" id="subtaskTitle" placeholder="Название задачи">
        <input type="date" id="subtaskDeadline">
        <input type="text" id="subtaskAssignee" placeholder="Исполнитель">
        <textarea id="subtaskComment" rows="2" placeholder="Комментарий"></textarea>
        <select id="subtaskPriority">
            <option value="medium">Средний</option><option value="critical">Критичный</option>
            <option value="high">Высокий</option><option value="low">Низкий</option>
        </select>
        <input type="hidden" id="currentParentId">
        <input type="hidden" id="editSubtaskId">
        <div class="modal-buttons">
            <button class="cancel-modal" onclick="closeSubtaskModal()">Отмена</button>
            <button class="save-modal" id="saveSubtaskBtn">Сохранить</button>
        </div>
    </div>
</div>

<script>
    // ========== ДАННЫЕ ==========
    let projects = [];
    let currentTheme = localStorage.getItem('theme') || 'light';

    const STATUSES = { assigned: "📌 Назначено", inwork: "⚙️ В работе", testing: "🧪 Тестирование", done: "✅ Выполнено" };
    const STATUS_ICONS = { assigned: "📌", inwork: "⚙️", testing: "🧪", done: "✅" };
    const COLORS = { assigned: "#f97316", inwork: "#3b82f6", testing: "#8b5cf6", done: "#10b981" };

    // Загрузка
    function loadData() {
        const stored = localStorage.getItem("crm_projects");
        if(stored) {
            projects = JSON.parse(stored);
        } else {
            projects = [
                { id: 1001, title: "Сайт Камп Дэвид", deadline: "2025-05-20", assignee: "Анна", comment: "", status: "assigned", priority: "high", tag: "design", expanded: true,
                  subtasks: [
                      { id: 2001, title: "Переделать верстку", deadline: "2025-05-18", assignee: "Давид", comment: "", status: "inwork", priority: "high" },
                      { id: 2002, title: "Настроить формы", deadline: "2025-05-22", assignee: "Ольга", comment: "", status: "assigned", priority: "medium" }
                  ] },
                { id: 1002, title: "Мобильное приложение", deadline: "2025-06-10", assignee: "Игорь", comment: "", status: "inwork", priority: "critical", tag: "backend", expanded: true,
                  subtasks: [{ id: 2003, title: "Экран логина", deadline: "2025-05-25", assignee: "Мария", comment: "", status: "testing", priority: "high" }] }
            ];
        }
        applyTheme();
    }

    function saveToLocal() { localStorage.setItem("crm_projects", JSON.stringify(projects)); }

    // Просрочка
    function isOverdue(deadline, status) {
        if(!deadline || status === "done") return false;
        return new Date(deadline) < new Date();
    }

    // Прогресс
    function getProgress(project) {
        if(!project.subtasks.length) return 0;
        const done = project.subtasks.filter(s => s.status === "done").length;
        return Math.round((done / project.subtasks.length) * 100);
    }

    // Уведомления
    function notify(msg, isError = false) {
        const div = document.createElement('div');
        div.textContent = msg;
        div.style.cssText = `position:fixed;bottom:20px;right:20px;background:${isError ? '#ef4444' : '#10b981'};color:white;padding:10px 20px;border-radius:8px;z-index:9999;`;
        document.body.appendChild(div);
        setTimeout(() => div.remove(), 2500);
    }

    // Обновить дашборд и фильтры
    function updateDashboard() {
        const totalSubtasks = projects.reduce((sum, p) => sum + p.subtasks.length, 0);
        const doneSubtasks = projects.reduce((sum, p) => sum + p.subtasks.filter(s => s.status === "done").length, 0);
        const overdue = projects.reduce((sum, p) => sum + p.subtasks.filter(s => isOverdue(s.deadline, s.status)).length, 0);
        const progress = totalSubtasks ? Math.round((doneSubtasks / totalSubtasks) * 100) : 0;
        document.getElementById('dashboard').innerHTML = `
            <div class="stat-card"><div class="stat-number">${projects.length}</div><div class="stat-label">Проектов</div></div>
            <div class="stat-card"><div class="stat-number">${totalSubtasks}</div><div class="stat-label">Всего задач</div></div>
            <div class="stat-card"><div class="stat-number">${doneSubtasks}</div><div class="stat-label">Выполнено</div></div>
            <div class="stat-card"><div class="stat-number">${overdue}</div><div class="stat-label">Просрочено</div></div>
            <div class="stat-card"><div class="stat-number">${progress}%</div><div class="stat-label">Общий прогресс</div></div>
        `;
        // Фильтр исполнителей
        const assignees = new Set();
        projects.forEach(p => { if(p.assignee) assignees.add(p.assignee); p.subtasks.forEach(s => { if(s.assignee) assignees.add(s.assignee); }); });
        const filterSel = document.getElementById('filterAssignee');
        filterSel.innerHTML = '<option value="">Все исполнители</option>' + [...assignees].map(a => `<option value="${a}">${a}</option>`).join('');
    }

    // Фильтрация
    function filterProjects(projs) {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const assignee = document.getElementById('filterAssignee').value;
        const priority = document.getElementById('filterPriority').value;
        return projs.filter(p => {
            if(search && !p.title.toLowerCase().includes(search)) return false;
            if(assignee && p.assignee !== assignee) return false;
            if(priority && p.priority !== priority) return false;
            return true;
        });
    }

    // Рендер
    function renderBoard() {
        const board = document.getElementById('kanbanBoard');
        board.innerHTML = '';
        for(let status of ['assigned', 'inwork', 'testing', 'done']) {
            const column = document.createElement('div');
            column.className = 'column';
            column.setAttribute('data-status', status);
            const projectsInCol = filterProjects(projects.filter(p => p.status === status));
            column.innerHTML = `
                <div class="column-header"><span>${STATUSES[status]}</span><span>${projectsInCol.length}</span></div>
                <div class="task-list" data-status-drop="${status}"></div>
            `;
            const taskList = column.querySelector('.task-list');
            projectsInCol.forEach(project => { taskList.appendChild(renderProject(project)); });
            board.appendChild(column);
            attachDragEvents(taskList);
        }
        updateDashboard();
    }

    function renderProject(project) {
        const wrapper = document.createElement('div');
        wrapper.className = `parent-task ${isOverdue(project.deadline, project.status) ? 'overdue' : ''}`;
        wrapper.setAttribute('data-project-id', project.id);
        wrapper.setAttribute('draggable', 'true');
        const progress = getProgress(project);
        const priorityText = { critical: '🔥 Крит', high: '⚠️ Выс', medium: '📌 Сред', low: '✅ Низ' }[project.priority] || '📌 Сред';
        const tagText = { bug: '🐛 Баг', feature: '✨ Фича', design: '🎨 Дизайн', backend: '⚙️ Бэкенд' }[project.tag] || '';

        wrapper.innerHTML = `
            <div class="parent-header">
                <div class="parent-title">
                    📁 ${escapeHtml(project.title)}
                    <span class="priority-badge priority-${project.priority}">${priorityText}</span>
                    ${project.tag ? `<span class="tag tag-${project.tag}">${tagText}</span>` : ''}
                </div>
                <button class="subtasks-toggle" style="background:none;border:none;cursor:pointer;font-size:1.2rem;">${project.expanded ? '▼' : '▶'}</button>
            </div>
            <div class="parent-meta">👤 ${escapeHtml(project.assignee || '—')} | 📅 ${project.deadline || '—'}</div>
            <div class="progress-wrap">
                <div class="progress-bar"><div class="progress-fill" style="width:${progress}%"></div></div>
                <div class="progress-text">Прогресс: ${progress}% (${project.subtasks.filter(s => s.status === 'done').length}/${project.subtasks.length})</div>
            </div>
            <div class="task-actions">
                <button class="edit-project-btn edit-btn">✏️ Ред.</button>
                <button class="delete-project-btn delete-btn">🗑️ Уд.</button>
                <button class="add-subtask-btn">+ Задача</button>
            </div>
            <div class="subtasks-container" style="display:${project.expanded ? 'block' : 'none'}; margin-top:0.8rem;"></div>
        `;
        const subtasksContainer = wrapper.querySelector('.subtasks-container');
        project.subtasks.forEach(sub => { subtasksContainer.appendChild(renderSubtask(project.id, sub)); });

        // Обработчики
        wrapper.querySelector('.subtasks-toggle').onclick = () => {
            project.expanded = !project.expanded;
            subtasksContainer.style.display = project.expanded ? 'block' : 'none';
            saveToLocal();
            renderBoard();
        };
        wrapper.querySelector('.edit-project-btn').onclick = () => openEditProject(project.id);
        wrapper.querySelector('.delete-project-btn').onclick = () => {
            if(confirm('Удалить проект?')) { projects = projects.filter(p => p.id !== project.id); saveToLocal(); renderBoard(); notify('Проект удалён'); }
        };
        wrapper.querySelector('.add-subtask-btn').onclick = () => openAddSubtask(project.id);

        // Drag для проекта
        wrapper.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', JSON.stringify({ type: 'project', id: project.id }));
            wrapper.style.opacity = '0.5';
        });
        wrapper.addEventListener('dragend', () => wrapper.style.opacity = '');
        return wrapper;
    }

    function renderSubtask(projectId, subtask) {
        const card = document.createElement('div');
        card.className = `subtask-card ${isOverdue(subtask.deadline, subtask.status) ? 'overdue' : ''}`;
        card.setAttribute('data-subtask-id', subtask.id);
        card.setAttribute('data-parent-id', projectId);
        card.setAttribute('draggable', 'true');
        card.style.borderLeftColor = COLORS[subtask.status];
        const priorityText = { critical: '🔥', high: '⚠️', medium: '📌', low: '✅' }[subtask.priority] || '📌';
        
        card.innerHTML = `
            <div class="subtask-title">
                <span>📎 ${escapeHtml(subtask.title)} <span style="font-size:0.7rem;">${priorityText}</span></span>
                <select class="status-select" data-project="${projectId}" data-subtask="${subtask.id}">
                    <option value="assigned" ${subtask.status === 'assigned' ? 'selected' : ''}>📌 Назначено</option>
                    <option value="inwork" ${subtask.status === 'inwork' ? 'selected' : ''}>⚙️ В работе</option>
                    <option value="testing" ${subtask.status === 'testing' ? 'selected' : ''}>🧪 Тестирование</option>
                    <option value="done" ${subtask.status === 'done' ? 'selected' : ''}>✅ Выполнено</option>
                </select>
            </div>
            <div class="subtask-meta">👤 ${escapeHtml(subtask.assignee || '—')} | 📅 ${subtask.deadline || '—'}</div>
            ${subtask.comment ? `<div style="font-size:0.7rem;color:var(--text-secondary);">💬 ${escapeHtml(subtask.comment)}</div>` : ''}
            <div class="task-actions">
                <button class="edit-subtask-btn edit-btn" style="padding:0.2rem 0.4rem;">✏️</button>
                <button class="delete-subtask-btn delete-btn" style="padding:0.2rem 0.4rem;">🗑️</button>
            </div>
        `;
        
        // Селект статуса
        card.querySelector('.status-select').onchange = (e) => {
            const newStatus = e.target.value;
            const project = projects.find(p => p.id == projectId);
            if(project) {
                const sub = project.subtasks.find(s => s.id == subtask.id);
                if(sub) { sub.status = newStatus; saveToLocal(); renderBoard(); notify(`Статус изменён на ${STATUSES[newStatus]}`); }
            }
        };
        card.querySelector('.edit-subtask-btn').onclick = () => openEditSubtask(projectId, subtask.id);
        card.querySelector('.delete-subtask-btn').onclick = () => {
            const project = projects.find(p => p.id == projectId);
            if(project) { project.subtasks = project.subtasks.filter(s => s.id !== subtask.id); saveToLocal(); renderBoard(); notify('Задача удалена'); }
        };
        
        card.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', JSON.stringify({ type: 'subtask', projectId, subtaskId: subtask.id }));
            card.style.opacity = '0.5';
        });
        card.addEventListener('dragend', () => card.style.opacity = '');
        return card;
    }

    function attachDragEvents(container) {
        container.addEventListener('dragover', (e) => { e.preventDefault(); container.classList.add('drag-over'); });
        container.addEventListener('dragleave', () => container.classList.remove('drag-over'));
        container.addEventListener('drop', (e) => {
            e.preventDefault();
            container.classList.remove('drag-over');
            const data = JSON.parse(e.dataTransfer.getData('text/plain'));
            const newStatus = container.parentElement.getAttribute('data-status');
            if(!newStatus) return;
            if(data.type === 'project') {
                const project = projects.find(p => p.id == data.id);
                if(project && project.status !== newStatus) { project.status = newStatus; saveToLocal(); renderBoard(); notify(`Проект перемещён в ${STATUSES[newStatus]}`); }
            } else if(data.type === 'subtask') {
                const project = projects.find(p => p.id == data.projectId);
                if(project) {
                    const subtask = project.subtasks.find(s => s.id == data.subtaskId);
                    if(subtask && subtask.status !== newStatus) { subtask.status = newStatus; saveToLocal(); renderBoard(); notify(`Задача перемещена в ${STATUSES[newStatus]}`); }
                }
            }
        });
    }

    // ========== МОДАЛКИ ==========
    function openAddProject() {
        document.getElementById('projectModalTitle').innerText = '📋 Новый проект';
        document.getElementById('projectTitle').value = '';
        document.getElementById('projectDeadline').value = '';
        document.getElementById('projectAssignee').value = '';
        document.getElementById('projectPriority').value = 'medium';
        document.getElementById('projectTag').value = '';
        document.getElementById('projectComment').value = '';
        document.getElementById('editProjectId').value = '';
        document.getElementById('projectModal').style.display = 'flex';
    }
    function openEditProject(id) {
        const p = projects.find(p => p.id == id);
        if(!p) return;
        document.getElementById('projectModalTitle').innerText = '✏️ Редактировать проект';
        document.getElementById('projectTitle').value = p.title;
        document.getElementById('projectDeadline').value = p.deadline || '';
        document.getElementById('projectAssignee').value = p.assignee || '';
        document.getElementById('projectPriority').value = p.priority || 'medium';
        document.getElementById('projectTag').value = p.tag || '';
        document.getElementById('projectComment').value = p.comment || '';
        document.getElementById('editProjectId').value = p.id;
        document.getElementById('projectModal').style.display = 'flex';
    }
    function saveProject() {
        const title = document.getElementById('projectTitle').value.trim();
        if(!title) { notify('Введите название', true); return; }
        const editId = document.getElementById('editProjectId').value;
        if(editId) {
            const p = projects.find(p => p.id == editId);
            if(p) { p.title = title; p.deadline = document.getElementById('projectDeadline').value; p.assignee = document.getElementById('projectAssignee').value;
                p.priority = document.getElementById('projectPriority').value; p.tag = document.getElementById('projectTag').value; p.comment = document.getElementById('projectComment').value; }
        } else {
            projects.push({ id: Date.now(), title, deadline: document.getElementById('projectDeadline').value, assignee: document.getElementById('projectAssignee').value,
                priority: document.getElementById('projectPriority').value, tag: document.getElementById('projectTag').value, comment: document.getElementById('projectComment').value,
                status: 'assigned', expanded: true, subtasks: [] });
        }
        saveToLocal(); renderBoard(); closeProjectModal(); notify('Сохранено');
    }
    function closeProjectModal() { document.getElementById('projectModal').style.display = 'none'; }

    function openAddSubtask(projectId) {
        document.getElementById('subtaskModalTitle').innerText = '➕ Новая задача';
        document.getElementById('subtaskTitle').value = '';
        document.getElementById('subtaskDeadline').value = '';
        document.getElementById('subtaskAssignee').value = '';
        document.getElementById('subtaskComment').value = '';
        document.getElementById('subtaskPriority').value = 'medium';
        document.getElementById('currentParentId').value = projectId;
        document.getElementById('editSubtaskId').value = '';
        document.getElementById('subtaskModal').style.display = 'flex';
    }
    function openEditSubtask(projectId, subtaskId) {
        const project = projects.find(p => p.id == projectId);
        if(!project) return;
        const sub = project.subtasks.find(s => s.id == subtaskId);
        if(!sub) return;
        document.getElementById('subtaskModalTitle').innerText = '✏️ Редактировать задачу';
        document.getElementById('subtaskTitle').value = sub.title;
        document.getElementById('subtaskDeadline').value = sub.deadline || '';
        document.getElementById('subtaskAssignee').value = sub.assignee || '';
        document.getElementById('subtaskComment').value = sub.comment || '';
        document.getElementById('subtaskPriority').value = sub.priority || 'medium';
        document.getElementById('currentParentId').value = projectId;
        document.getElementById('editSubtaskId').value = subtaskId;
        document.getElementById('subtaskModal').style.display = 'flex';
    }
    function saveSubtask() {
        const title = document.getElementById('subtaskTitle').value.trim();
        if(!title) { notify('Введите название', true); return; }
        const projectId = parseInt(document.getElementById('currentParentId').value);
        const project = projects.find(p => p.id == projectId);
        if(!project) return;
        const editId = document.getElementById('editSubtaskId').value;
        if(editId) {
            const sub = project.subtasks.find(s => s.id == editId);
            if(sub) { sub.title = title; sub.deadline = document.getElementById('subtaskDeadline').value; sub.assignee = document.getElementById('subtaskAssignee').value;
                sub.comment = document.getElementById('subtaskComment').value; sub.priority = document.getElementById('subtaskPriority').value; }
        } else {
            project.subtasks.push({ id: Date.now(), title, deadline: document.getElementById('subtaskDeadline').value, assignee: document.getElementById('subtaskAssignee').value,
                comment: document.getElementById('subtaskComment').value, priority: document.getElementById('subtaskPriority').value, status: 'assigned' });
        }
        saveToLocal(); renderBoard(); closeSubtaskModal(); notify('Сохранено');
    }
    function closeSubtaskModal() { document.getElementById('subtaskModal').style.display = 'none'; }

    // Тема и экспорт
    function applyTheme() {
        if(currentTheme === 'dark') document.body.classList.add('dark');
        else document.body.classList.remove('dark');
        document.getElementById('themeToggle').innerHTML = currentTheme === 'dark' ? '☀️ Светлая' : '🌙 Тёмная';
    }
    function toggleTheme() { currentTheme = currentTheme === 'dark' ? 'light' : 'dark'; localStorage.setItem('theme', currentTheme); applyTheme(); renderBoard(); }
    function exportCSV() {
        let csv = "Тип,Название,Исполнитель,Дедлайн,Статус,Приоритет\n";
        projects.forEach(p => {
            csv += `"Проект","${p.title}","${p.assignee || ''}","${p.deadline || ''}","${STATUSES[p.status]}","${p.priority}"\n`;
            p.subtasks.forEach(s => { csv += `"Задача","${s.title}","${s.assignee || ''}","${s.deadline || ''}","${STATUSES[s.status]}","${s.priority}"\n`; });
        });
        const blob = new Blob([csv], { type: 'text/csv' }); const link = document.createElement('a');
        link.href = URL.createObjectURL(blob); link.download = `crm_${Date.now()}.csv`; link.click(); notify('Экспорт готов');
    }

    function escapeHtml(str) { if(!str) return ''; return str.replace(/[&<>]/g, m => ({ '&':'&amp;', '<':'&lt;', '>':'&gt;' }[m])); }

    // Инициализация
    function init() {
        loadData(); renderBoard();
        document.getElementById('openParentModalBtn').onclick = openAddProject;
        document.getElementById('saveProjectBtn').onclick = saveProject;
        document.getElementById('saveSubtaskBtn').onclick = saveSubtask;
        document.getElementById('themeToggle').onclick = toggleTheme;
        document.getElementById('exportBtn').onclick = exportCSV;
        document.getElementById('searchInput').oninput = () => renderBoard();
        document.getElementById('filterAssignee').onchange = () => renderBoard();
        document.getElementById('filterPriority').onchange = () => renderBoard();
        window.onclick = (e) => { if(e.target.classList.contains('modal')) { closeProjectModal(); closeSubtaskModal(); } };
    }
    init();
</script>
</body>
</html>