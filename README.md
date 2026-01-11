# Gestor de Tareas en PHP

Proyecto de **gestión de tareas** desarrollado en **PHP** siguiendo una arquitectura **MVC**, con **MySQL** como base de datos y pensado para ejecutarse en **local con XAMPP**.

El sistema permite:

* Registro de usuarios
* Inicio y cierre de sesión
* Creación, edición y eliminación de tareas
* Gestión de tareas asociadas a cada usuario

---

## 📋 Requisitos

Para ejecutar este proyecto necesitas:

* XAMPP (Apache + MySQL)
* PHP 8 o superior
* Navegador web

---

## 📁 Estructura del proyecto

```
Gestor-de-Tareas/
│
├── controller/        # Controladores (lógica de la aplicación)
├── models/            # Modelos (acceso a datos)
├── views/             # Vistas (HTML + PHP)
│
├── config/
│   └── dataBase.php   # Conexión a la base de datos
│
├── session.php    # Gestión de sesiones y autenticación
│
├── gestorTareas.sql   # Script SQL (estructura de la base de datos)
├── index.php          # Punto de entrada de la aplicación
└── README.md
```

---

## ⚙️ Instalación y configuración

Sigue estos pasos para ejecutar el proyecto en tu máquina:

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/Rusby6/Gestor-de-Tareas.git
```

### 2️⃣ Mover el proyecto a XAMPP

Copia la carpeta del proyecto dentro de:

```
C:\xampp\htdocs\
```

Ejemplo:

```
C:\xampp\htdocs\Gestor-de-Tareas
```

---

### 3️⃣ Iniciar servicios

Abre XAMPP y arranca:

* Apache
* MySQL

---

### 4️⃣ Crear la base de datos

1. Abre **phpMyAdmin** ([http://localhost/phpmyadmin](http://localhost/phpmyadmin))
2. Crea una base de datos llamada:

```
gestortareas
```

3. Importa el archivo:

```
gestorTareas.sql
```

Este archivo **solo contiene la estructura**, no usuarios ni tareas.

---

### 5️⃣ Configurar la conexión a la base de datos

Abre el archivo:

```
config/dataBase.php
```

Verifica que los datos sean correctos:

```php
$hostDB = "127.0.0.1";
$nameDB = "gestortareas";
$userDB = "root";
$passwordDB = "";
```

(Configuración por defecto de XAMPP)

---

## ▶️ Ejecutar la aplicación

Abre tu navegador y accede a:

```
http://localhost/Gestor-de-Tareas/index.php
```

---

## 👤 Uso de la aplicación

1. Registra un nuevo usuario desde la interfaz
2. Inicia sesión con tus credenciales
3. Crea, edita y elimina tus propias tareas
4. Cada usuario solo puede ver y gestionar sus tareas

Las sesiones se gestionan mediante PHP y se cierran automáticamente al cerrar sesión.

---

## 🔐 Seguridad

* Las contraseñas se almacenan **hasheadas** en la base de datos
* Cada usuario tiene una sesión independiente
* Las tareas están asociadas a su usuario mediante clave foránea
* Al eliminar un usuario, sus tareas se eliminan automáticamente (`ON DELETE CASCADE`)

---

## 🛠️ Tecnologías usadas

* PHP
* MySQL
* PDO
* HTML / CSS
* XAMPP
