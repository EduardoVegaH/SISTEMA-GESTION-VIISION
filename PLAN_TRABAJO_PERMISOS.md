# 📋 PLAN DE TRABAJO - SISTEMA DE ROLES Y PERMISOS

**Proyecto:** VIISION-SISTEMA  
**Fecha Inicio:** 25 de Diciembre, 2025  
**Objetivo:** Corregir y mejorar el sistema completo de roles y permisos

---

## 🎯 FASE 1: CORRECCIONES CRÍTICAS DE SEGURIDAD
**Prioridad:** 🔴 CRÍTICA  
**Tiempo estimado:** 2-3 horas  
**Debe completarse:** HOY

### ✅ Tareas de Seguridad

### (Termiando)
### - [ ] **1.1 - Corregir middleware mal configurado**
###   - **Archivo:** `app/Http/Kernel.php`
###   - **Línea:** 68
###   - **Acción:** Cambiar de `RoleMiddleware::class` a `RoleOrPermissionMiddleware::class`
###   - **Código:**
###     ```php
###     'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
###     ```
###   - **Verificar:** Ningún error de clase no encontrada
###   - ⏱️ **5 minutos**

---
### (Termiando)
### - [ ] **1.2 - Crear permisos faltantes para transferencias**
###   - **Archivo:** `database/seeders/SyncPermissionsSeeder.php`
###   - **Línea:** Añadir en array de permisos (después línea 26)
###   - **Acción:** Agregar permisos de transferencias
###   - **Código a agregar:**
###     ```php
###     'ver-transferencias',
###     'gestionar-transferencias',
###     ```
###   - ⏱️ **2 minutos**


---
### (Termiando)
### - [ ] **1.3 - Crear permisos para reportes**
###   - **Archivo:** `database/seeders/SyncPermissionsSeeder.php`
###   - **Línea:** Añadir en array de permisos
###   - **Acción:** Agregar permisos de reportes
###   - **Código a agregar:**
###     ```php
###     'ver-reportes',
###     'gestionar-reportes',
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **1.4 - Proteger ruta de transferencias**
###   - **Archivo:** `routes/web.php`
###   - **Línea:** 51-53
###   - **Acción:** Agregar middleware de permiso
###   - **Código actual:**
###     ```php
###     Route::get('/transferencias', function() {
###         return view('transferencias.index');
###     })->name('transferencias.index');
###     ```
###   - **Código corregido:**
###     ```php
###     Route::get('/transferencias', function() {
###         return view('transferencias.index');
###     })->name('transferencias.index')->middleware('permission:ver-transferencias');
###     ```
###   - ⏱️ **3 minutos**

---
### (Terminado)
### - [ ] **1.5 - Proteger ruta de reportes**
###   - **Archivo:** `routes/web.php`
###   - **Línea:** 56-57
###   - **Acción:** Agregar middleware de permiso
###   - **Código actual:**
###     ```php
###     Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
###     ```
###   - **Código corregido:**
###     ```php
###     Route::get('/reportes', [ReporteController::class, 'index'])
###         ->name('reportes.index')
###         ->middleware('permission:ver-reportes');
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **1.6 - Ejecutar seeder de sincronización**
###   - **Comando:**
###     ```bash
###     php artisan db:seed --class=SyncPermissionsSeeder
###     ```
###   - **Verificar:** Mensaje de confirmación sin errores
###   - ⏱️ **1 minuto**

---
### (Terminado)
### - [ ] **1.7 - Limpiar cache de permisos**
###   - **Comando:**
###     ```bash
###     php artisan permission:cache-reset
###     ```
###   - **Verificar:** Cache limpiada exitosamente
###   - ⏱️ **1 minuto**

---
### (Terminado)
### - [ ] **1.8 - Verificar rutas protegidas**
###   - **Acción:** Probar acceso sin permisos
###   - **Método:** Crear usuario de prueba sin permisos y acceder a `/transferencias` y `/reportes`
###   - **Resultado esperado:** Error 403 Forbidden
###   - ⏱️ **10 minutos**

---

## 🎨 FASE 2: MEJORA DE EXPERIENCIA DE USUARIO
**Prioridad:** 🔴 CRÍTICA  
**Tiempo estimado:** 1-2 horas  
**Debe completarse:** HOY

### ✅ Tareas de Interface
### (Terminado)
### - [ ] **2.1 - Proteger opción Dashboard en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 175-177
###   - **Acción:** Envolver con directiva `@can`
###   - **Código actual:**
###     ```blade
###     <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
###         <i class="bi bi-speedometer2"></i> Dashboard
###     </a></li>
###     ```
###   - **Código corregido:**
###     ```blade
###     @can('ver-dashboard')
###     <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
###         <i class="bi bi-speedometer2"></i> Dashboard
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.2 - Proteger opción Inventario en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 178-180
###   - **Código corregido:**
###     ```blade
###     @can('ver-inventario')
###     <li><a href="{{ route('inventario.index') }}" class="{{ request()->routeIs('inventario.*') ? 'active' : '' }}">
###         <i class="bi bi-box-seam"></i> Inventario
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado) 
### - [ ] **2.3 - Proteger opción Cotización en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 181-183
###   - **Código corregido:**
###     ```blade
###     @can('ver-cotizaciones')
###     <li><a href="{{ route('cotizaciones.index') }}" class="{{ request()->routeIs('cotizaciones.*') ? 'active' : '' }}">
###         <i class="bi bi-clipboard"></i> Cotización
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.4 - Proteger opción Caja en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 184-186
###   - **Código corregido:**
###     ```blade
###     @can('ver-caja')
###     <li><a href="{{ route('caja.index') }}" class="{{ request()->routeIs('caja.*') ? 'active' : '' }}">
###         <i class="bi bi-cash-register"></i> Caja
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.5 - Proteger opción Clientes en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 187-189
###   - **Código corregido:**
###     ```blade
###     @can('ver-clientes')
###     <li><a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
###         <i class="bi bi-people"></i> Clientes
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.6 - Proteger opción Empleados en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 190-192
###   - **Código corregido:**
###     ```blade
###     @can('ver-empleados')
###     <li><a href="{{ route('empleados.index') }}" class="{{ request()->routeIs('empleados.*') ? 'active' : '' }}">
###         <i class="bi bi-person"></i> Empleados
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.7 - Proteger opción Tiendas en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 193-195
###   - **Código corregido:**
###     ```blade
###     @can('ver-tiendas')
###     <li><a href="{{ route('tiendas.index') }}" class="{{ request()->routeIs('tiendas.*') ? 'active' : '' }}">
###         <i class="bi bi-shop-window"></i> Tiendas
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.8 - Proteger opción Almacenes en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 196-198
###   - **Código corregido:**
###     ```blade
###     @can('ver-almacenes')
###     <li><a href="{{ route('almacenes.index') }}" class="{{ request()->routeIs('almacenes.*') ? 'active' : '' }}">
###         <i class="bi bi-building"></i> Almacenes
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.9 - Proteger opción Transferencias en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 199-201
###   - **Código corregido:**
###     ```blade
###     @can('ver-transferencias')
###     <li><a href="{{ route('transferencias.index') }}" class="{{ request()->routeIs('transferencias.*') ? 'active' : '' }}">
###         <i class="bi bi-arrow-left-right"></i> Transferencias
###     </a></li>
###     @endcan
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.10 - Proteger opción Reportes en menú**
###   - **Archivo:** `resources/views/layouts/app.blade.php`
###   - **Línea:** 202-204
###   - **Código corregido:**
###     ```blade
###     @can('ver-reportes')
###     <li><a href="{{ route('reportes.index') }}" class="{{ request()->routeIs('reportes.*') ? 'active' : '' }}">
###         <i class="bi bi-graph-up"></i> Reportes
###     </a></li>
###     @endcan
###     ```
  - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **2.11 - Verificar menú con diferentes roles**
###   - **Acción:** Login con Admin, Vendedor y Almacenista
###   - **Verificar:** Cada usuario solo ve sus opciones permitidas
###   - ⏱️ **15 minutos**

---

## 🔧 FASE 3: CORRECCIÓN DE PERMISOS DE ROLES
**Prioridad:** 🟠 IMPORTANTE  
**Tiempo estimado:** 1 hora  
**Debe completarse:** Esta semana

### ✅ Tareas de Permisos
### (Terminado)
### - [ ] **3.1 - Actualizar permisos del rol Vendedor**
###   - **Archivo:** `database/seeders/RolesAndPermissionsSeeder.php`
###   - **Línea:** 37-42
###   - **Acción:** Agregar permisos de "ver-*" faltantes
###   - **Código actual:**
###     ```php
###     $roleVendedor->givePermissionTo([
###         'ver-dashboard',
###         'gestionar-clientes',
###         'gestionar-cotizaciones',
###         'gestionar-pedidos',
###     ]);
###     ```
###   - **Código corregido:**
###     ```php
###     $roleVendedor->givePermissionTo([
###         'ver-dashboard',
###         'ver-clientes',
###         'gestionar-clientes',
###         'ver-cotizaciones',
###         'crear-cotizaciones',
###         'gestionar-cotizaciones',
###         'gestionar-pedidos',
###         'ver-caja',
###     ]);
###     ```
###   - ⏱️ **5 minutos**

---
### (Terminado)
### - [ ] **3.2 - Actualizar permisos del rol Almacenista**
###   - **Archivo:** `database/seeders/RolesAndPermissionsSeeder.php`
###   - **Línea:** 45-49
###   - **Acción:** Agregar permisos de "ver-*" faltantes
###   - **Código actual:**
###     ```php
###     $roleAlmacenista->givePermissionTo([
###         'gestionar-almacen',
###         'gestionar-articulos',
###         'gestionar-inventario',
###     ]);
###     ```
###   - **Código corregido:**
###     ```php
###     $roleAlmacenista->givePermissionTo([
###         'ver-almacenes',
###         'gestionar-almacen',
###         'gestionar-articulos',
###         'ver-inventario',
###         'gestionar-inventario',
###         'ver-transferencias',
###         'gestionar-transferencias',
###     ]);
###     ```
###   - ⏱️ **5 minutos**

---
### (Terminado)
### - [ ] **3.3 - Renombrar rol "Almacenistas" a "Almacenista"**
###   - **Archivo:** `database/seeders/RolesAndPermissionsSeeder.php`
###   - **Línea:** 16
###   - **Acción:** Cambiar nombre del rol a singular
###   - **Código actual:**
###     ```php
###     $roleAlmacenista = Role::firstOrCreate(['name' => 'Almacenistas']);
###     ```
###   - **Código corregido:**
###     ```php
###     $roleAlmacenista = Role::firstOrCreate(['name' => 'Almacenista']);
###     ```
###   - ⚠️ **NOTA:** Este cambio requiere migración manual si ya hay usuarios con el rol antiguo
###   - ⏱️ **5 minutos**

---
### (Terminado)
### - [ ] **3.4 - Crear migración para renombrar rol existente**
###   - **Comando:**
###     ```bash
###     php artisan make:migration rename_almacenistas_role
###     ```
###   - **Archivo creado:** `database/migrations/YYYY_MM_DD_XXXXXX_rename_almacenistas_role.php`
###   - **Código del migration:**
###     ```php
###     public function up()
###     {
###         DB::table('roles')
###             ->where('name', 'Almacenistas')
###             ->update(['name' => 'Almacenista']);
###     }
### 
###     public function down()
###     {
###         DB::table('roles')
###             ->where('name', 'Almacenista')
###             ->update(['name' => 'Almacenistas']);
###     }
###     ```
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **3.5 - Ejecutar migración de renombrado**
###   - **Comando:**
###     ```bash
###     php artisan migrate
###     ```
###   - **Verificar:** Migración ejecutada sin errores
###   - ⏱️ **2 minutos**

---
### (Terminado)
###- [ ] **3.6 - Re-ejecutar seeder de roles y permisos**
###  - **Comando:**
###    ```bash
###    php artisan db:seed --class=RolesAndPermissionsSeeder
###    ```
###  - **Verificar:** Permisos actualizados correctamente
###  - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **3.7 - Limpiar cache de permisos nuevamente**
###   - **Comando:**
###     ```bash
###     php artisan permission:cache-reset
###     ```
###   - ⏱️ **1 minuto**

---
### (Terminado)
### - [ ] **3.8 - Verificar permisos de cada rol en Tinker**
###   - **Comandos:**
###     ```bash
###     php artisan tinker
###     >>> Role::where('name', 'Vendedor')->first()->permissions->pluck('name');
###     >>> Role::where('name', 'Almacenista')->first()->permissions->pluck('name');
###     >>> Role::where('name', 'Admin')->first()->permissions->pluck('name');
###     >>> exit
###     ```
###   - **Verificar:** Cada rol tiene los permisos correctos
###   - ⏱️ **10 minutos**

---

## 🛡️ FASE 4: AUTORIZACIÓN EN CONTROLADORES
**Prioridad:** 🟠 IMPORTANTE  
**Tiempo estimado:** 2-3 horas  
**Debe completarse:** Esta semana

### ✅ Tareas de Controladores

### (Terminado)
### - [ ] **4.1 - Agregar autorización en ClienteController::store**
###   - **Archivo:** `app/Http/Controllers/ClienteController.php`
###   - **Línea:** 45 (después de la firma del método)
###   - **Código a agregar:**
###     ```php
###     $this->authorize('gestionar-clientes');
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **4.2 - Agregar autorización en ClienteController::update**
###   - **Archivo:** `app/Http/Controllers/ClienteController.php`
###   - **Línea:** 65 (después de la firma del método)
###   - **Código a agregar:**
###     ```php
###     $this->authorize('gestionar-clientes');
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **4.3 - Agregar autorización en ClienteController::destroy**
###   - **Archivo:** `app/Http/Controllers/ClienteController.php`
###   - **Línea:** 80 (después de la firma del método)
###   - **Código a agregar:**
###     ```php
###     $this->authorize('gestionar-clientes');
###     ```
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **4.4 - Crear lista de controladores que necesitan autorización**
###   - **Acción:** Revisar todos los controladores en `app/Http/Controllers`
###   - **Lista de controladores a actualizar:**
###     - ArticuloController
###     - InventarioController
###     - CotizacionController
###     - PedidoController
###     - CajaController
###     - EmpleadoController
###     - TiendaController
###     - AlmacenController
###     - ReporteController
###   - ⏱️ **15 minutos**

---
### (Terminado)
### - [ ] **4.5 - Agregar autorización en ArticuloController**
###   - **Métodos a proteger:** store, update, destroy
###   - **Permiso:** `gestionar-articulos`
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.6 - Agregar autorización en InventarioController**
###   - **Métodos a proteger:** store, update, destroy (si existen)
###   - **Permiso:** `gestionar-inventario`
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.7 - Agregar autorización en CotizacionController**
###   - **Métodos a proteger:** store, update, destroy
###   - **Permiso:** `gestionar-cotizaciones` o `crear-cotizaciones` (según el método)
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.8 - Agregar autorización en CajaController**
###   - **Métodos a proteger:** store, update, destroy (si existen)
###   - **Permiso:** `gestionar-caja`
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.9 - Agregar autorización en EmpleadoController**
###   - **Métodos a proteger:** store, update, destroy (cuando se implementen)
###   - **Permiso:** `gestionar-empleados`
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.10 - Agregar autorización en TiendaController**
###   - **Métodos a proteger:** store, update, destroy (cuando se implementen)
###   - **Permiso:** `gestionar-tiendas`
###   - ⏱️ **10 minutos**

---
### (Terminado)
### - [ ] **4.11 - Agregar autorización en AlmacenController**
###   - **Métodos a proteger:** store, update, destroy (cuando se implementen)
###   - **Permiso:** `gestionar-almacen`
###   - ⏱️ **10 minutos**

---
### (Terminado)
###    - [ ] **4.12 - Verificar autorizaciones con tests manuales**
###    - **Acción:** Intentar ejecutar acciones sin permisos
###    - **Resultado esperado:** Error 403 o AuthorizationException
###    - ⏱️ **20 minutos**

---

## 🧪 FASE 5: TESTING COMPLETO
**Prioridad:** 🟡 DESEABLE  
**Tiempo estimado:** 3-4 horas  
**Debe completarse:** Próxima semana

### ✅ Tareas de Testing
### (Terminado)
### - [ ] **5.1 - Crear archivo de tests completo**
###   - **Comando:**
###     ```bash
###     php artisan make:test PermissionSystemTest
###     ```
###   - **Archivo creado:** `tests/Feature/PermissionSystemTest.php`
###   - ⏱️ **2 minutos**

---
### (Terminado)
### - [ ] **5.2 - Escribir test: Admin puede acceder a todas las rutas**
###   - **Test:** `test_admin_can_access_all_routes`
###   - **Rutas a probar:** dashboard, clientes, empleados, tiendas, almacenes, inventario, caja, cotizaciones, reportes, transferencias
###   - ⏱️ **20 minutos**

---
### (Terminado)
### - [ ] **5.3 - Escribir test: Vendedor puede acceder a sus rutas**
###   - **Test:** `test_vendedor_can_access_allowed_routes`
###   - **Rutas a probar:** dashboard, clientes, cotizaciones, caja
###   - ⏱️ **15 minutos**

---
### (Terminado)
### - [ ] **5.4 - Escribir test: Vendedor NO puede acceder a rutas prohibidas**
###   - **Test:** `test_vendedor_cannot_access_forbidden_routes`
###   - **Rutas a probar:** empleados, tiendas, almacenes, inventario, reportes
###   - ⏱️ **15 minutos**

---
### (Terminado)
### - [ ] **5.5 - Escribir test: Almacenista puede acceder a sus rutas**
###   - **Test:** `test_almacenista_can_access_allowed_routes`
###   - **Rutas a probar:** inventario, almacenes, transferencias
###   - ⏱️ **15 minutos**

---

- [ ] **5.6 - Escribir test: Almacenista NO puede acceder a rutas prohibidas**
  - **Test:** `test_almacenista_cannot_access_forbidden_routes`
  - **Rutas a probar:** clientes, empleados, tiendas, caja, cotizaciones, reportes
  - ⏱️ **15 minutos**

---

- [ ] **5.7 - Escribir test: Usuario sin rol no puede acceder a nada**
  - **Test:** `test_user_without_role_cannot_access_protected_routes`
  - ⏱️ **10 minutos**

---

- [ ] **5.8 - Escribir test: Vendedor puede crear cotización**
  - **Test:** `test_vendedor_can_create_cotizacion`
  - ⏱️ **15 minutos**

---

- [ ] **5.9 - Escribir test: Almacenista NO puede crear cotización**
  - **Test:** `test_almacenista_cannot_create_cotizacion`
  - ⏱️ **10 minutos**

---

- [ ] **5.10 - Ejecutar suite de tests**
  - **Comando:**
    ```bash
    php artisan test --filter=PermissionSystemTest
    ```
  - **Verificar:** Todos los tests pasan
  - ⏱️ **5 minutos**

---

- [ ] **5.11 - Configurar CI/CD para tests automáticos (opcional)**
  - **Archivo:** `.github/workflows/tests.yml` o similar
  - ⏱️ **30 minutos**

---

## 🎨 FASE 6: MEJORAS EN VISTAS
**Prioridad:** 🟡 DESEABLE  
**Tiempo estimado:** 2-3 horas  
**Debe completarse:** Próxima semana

### ✅ Tareas de Vistas

- [ ] **6.1 - Proteger botones de acción en vista clientes/index**
  - **Archivo:** `resources/views/clientes/index.blade.php`
  - **Acción:** Envolver botones "Editar" y "Eliminar" con `@can('gestionar-clientes')`
  - ⏱️ **10 minutos**

---

- [ ] **6.2 - Proteger botón "Nuevo Cliente"**
  - **Archivo:** `resources/views/clientes/index.blade.php`
  - **Acción:** Envolver botón con `@can('gestionar-clientes')`
  - ⏱️ **5 minutos**

---

- [ ] **6.3 - Proteger botones en vista cotizaciones/index**
  - **Archivo:** `resources/views/cotizaciones/index.blade.php`
  - **Acción:** Proteger botones de acción con permisos correspondientes
  - ⏱️ **10 minutos**

---

- [ ] **6.4 - Proteger botones en vista inventario/index**
  - **Archivo:** `resources/views/inventario/index.blade.php`
  - **Acción:** Proteger botones de acción
  - ⏱️ **10 minutos**

---

- [ ] **6.5 - Proteger botones en vista caja/index**
  - **Archivo:** `resources/views/caja/index.blade.php`
  - **Acción:** Proteger botones de acción
  - ⏱️ **10 minutos**

---

- [ ] **6.6 - Proteger botones en vista empleados/index**
  - **Archivo:** `resources/views/empleados/index.blade.php`
  - **Acción:** Proteger botones de acción
  - ⏱️ **10 minutos**

---

- [ ] **6.7 - Proteger botones en vista tiendas/index**
  - **Archivo:** `resources/views/tiendas/index.blade.php`
  - **Acción:** Proteger botones de acción
  - ⏱️ **10 minutos**

---

- [ ] **6.8 - Proteger botones en vista almacenes/index**
  - **Archivo:** `resources/views/almacenes/index.blade.php`
  - **Acción:** Proteger botones de acción
  - ⏱️ **10 minutos**

---

- [ ] **6.9 - Verificar todas las vistas con diferentes roles**
  - **Acción:** Login con cada rol y verificar que solo se muestran botones permitidos
  - ⏱️ **30 minutos**

---

## 📚 FASE 7: DOCUMENTACIÓN
**Prioridad:** 🟡 DESEABLE  
**Tiempo estimado:** 1-2 horas  
**Debe completarse:** Próxima semana

### ✅ Tareas de Documentación

- [ ] **7.1 - Crear archivo README de permisos**
  - **Archivo:** `docs/PERMISOS.md`
  - **Contenido:** Documentar todos los roles y permisos del sistema
  - ⏱️ **30 minutos**

---

- [ ] **7.2 - Documentar cómo agregar nuevos permisos**
  - **Archivo:** `docs/PERMISOS.md`
  - **Sección:** "Cómo agregar nuevos permisos"
  - ⏱️ **15 minutos**

---

- [ ] **7.3 - Documentar cómo crear nuevos roles**
  - **Archivo:** `docs/PERMISOS.md`
  - **Sección:** "Cómo crear nuevos roles"
  - ⏱️ **15 minutos**

---

- [ ] **7.4 - Crear diagrama de permisos**
  - **Herramienta:** Draw.io, Mermaid, o similar
  - **Contenido:** Diagrama de roles y permisos
  - ⏱️ **30 minutos**

---

- [ ] **7.5 - Actualizar README.md principal del proyecto**
  - **Archivo:** `README.md`
  - **Sección:** Agregar sección de "Sistema de Permisos"
  - ⏱️ **15 minutos**

---

## 🚀 FASE 8: VERIFICACIÓN FINAL
**Prioridad:** 🔴 CRÍTICA  
**Tiempo estimado:** 1-2 horas  
**Debe completarse:** Antes de deploy

### ✅ Tareas de Verificación

- [ ] **8.1 - Crear usuarios de prueba para cada rol**
  - **Usuarios a crear:**
    - admin@test.com (Admin)
    - vendedor@test.com (Vendedor)
    - almacenista@test.com (Almacenista)
  - ⏱️ **10 minutos**

---

- [ ] **8.2 - Verificar acceso completo como Admin**
  - **Acción:** Login y probar todas las funcionalidades
  - **Checklist:**
    - [ ] Dashboard
    - [ ] Clientes (ver, crear, editar, eliminar)
    - [ ] Inventario
    - [ ] Cotizaciones
    - [ ] Caja
    - [ ] Empleados
    - [ ] Tiendas
    - [ ] Almacenes
    - [ ] Transferencias
    - [ ] Reportes
  - ⏱️ **20 minutos**

---

- [ ] **8.3 - Verificar acceso limitado como Vendedor**
  - **Acción:** Login y verificar restricciones
  - **Checklist:**
    - [ ] Dashboard (✅ permitido)
    - [ ] Clientes (✅ permitido)
    - [ ] Cotizaciones (✅ permitido)
    - [ ] Caja (✅ permitido)
    - [ ] Inventario (❌ prohibido - no visible en menú)
    - [ ] Empleados (❌ prohibido - no visible en menú)
    - [ ] Tiendas (❌ prohibido - no visible en menú)
    - [ ] Almacenes (❌ prohibido - no visible en menú)
    - [ ] Transferencias (❌ prohibido - no visible en menú)
    - [ ] Reportes (❌ prohibido - no visible en menú)
  - ⏱️ **15 minutos**

---

- [ ] **8.4 - Verificar acceso limitado como Almacenista**
  - **Acción:** Login y verificar restricciones
  - **Checklist:**
    - [ ] Inventario (✅ permitido)
    - [ ] Almacenes (✅ permitido)
    - [ ] Transferencias (✅ permitido)
    - [ ] Dashboard (❌ prohibido - no visible en menú)
    - [ ] Clientes (❌ prohibido - no visible en menú)
    - [ ] Cotizaciones (❌ prohibido - no visible en menú)
    - [ ] Caja (❌ prohibido - no visible en menú)
    - [ ] Empleados (❌ prohibido - no visible en menú)
    - [ ] Tiendas (❌ prohibido - no visible en menú)
    - [ ] Reportes (❌ prohibido - no visible en menú)
  - ⏱️ **15 minutos**

---

- [ ] **8.5 - Probar acceso directo a URLs prohibidas**
  - **Acción:** Como vendedor, intentar acceder via URL a `/empleados`
  - **Resultado esperado:** Error 403 Forbidden
  - **URLs a probar:**
    - `/empleados`
    - `/tiendas`
    - `/almacenes`
    - `/inventario`
    - `/reportes`
  - ⏱️ **15 minutos**

---

- [ ] **8.6 - Verificar que cache de permisos funciona**
  - **Acción:** Asignar permiso nuevo a un usuario y verificar que se aplica después de limpiar cache
  - ⏱️ **10 minutos**

---

- [ ] **8.7 - Ejecutar todos los tests**
  - **Comando:**
    ```bash
    php artisan test
    ```
  - **Verificar:** Todos pasan
  - ⏱️ **5 minutos**

---

- [ ] **8.8 - Revisar logs de errores**
  - **Archivo:** `storage/logs/laravel.log`
  - **Verificar:** No hay errores relacionados con permisos
  - ⏱️ **10 minutos**

---

- [ ] **8.9 - Verificar performance**
  - **Acción:** Verificar que la aplicación no se ralentiza con las consultas de permisos
  - **Herramienta:** Laravel Debugbar o Telescope (opcional)
  - ⏱️ **15 minutos**

---

- [ ] **8.10 - Crear checklist de deploy**
  - **Archivo:** `docs/DEPLOY_CHECKLIST.md`
  - **Contenido:** Pasos para deploy con permisos
  - ⏱️ **20 minutos**

---

## 📊 RESUMEN DE TIEMPOS ESTIMADOS

| Fase | Prioridad | Tiempo Estimado | Plazo |
|------|-----------|----------------|-------|
| **FASE 1:** Correcciones Críticas de Seguridad | 🔴 CRÍTICA | 2-3 horas | HOY |
| **FASE 2:** Mejora de Experiencia de Usuario | 🔴 CRÍTICA | 1-2 horas | HOY |
| **FASE 3:** Corrección de Permisos de Roles | 🟠 IMPORTANTE | 1 hora | Esta semana |
| **FASE 4:** Autorización en Controladores | 🟠 IMPORTANTE | 2-3 horas | Esta semana |
| **FASE 5:** Testing Completo | 🟡 DESEABLE | 3-4 horas | Próxima semana |
| **FASE 6:** Mejoras en Vistas | 🟡 DESEABLE | 2-3 horas | Próxima semana |
| **FASE 7:** Documentación | 🟡 DESEABLE | 1-2 horas | Próxima semana |
| **FASE 8:** Verificación Final | 🔴 CRÍTICA | 1-2 horas | Antes de deploy |
| **TOTAL** | | **13-20 horas** | 1-2 semanas |

---

## 🎯 PLAN DE EJECUCIÓN RECOMENDADO

### 📅 DÍA 1 (HOY)
- ✅ Completar FASE 1: Correcciones Críticas de Seguridad
- ✅ Completar FASE 2: Mejora de Experiencia de Usuario
- ⏱️ **Total: 3-5 horas**

### 📅 DÍA 2
- ✅ Completar FASE 3: Corrección de Permisos de Roles
- ✅ Iniciar FASE 4: Autorización en Controladores (50%)
- ⏱️ **Total: 2-3 horas**

### 📅 DÍA 3
- ✅ Completar FASE 4: Autorización en Controladores
- ✅ Iniciar FASE 5: Testing Completo (30%)
- ⏱️ **Total: 2-3 horas**

### 📅 DÍA 4-5
- ✅ Completar FASE 5: Testing Completo
- ✅ Completar FASE 6: Mejoras en Vistas
- ⏱️ **Total: 4-6 horas**

### 📅 DÍA 6
- ✅ Completar FASE 7: Documentación
- ✅ Completar FASE 8: Verificación Final
- ⏱️ **Total: 2-4 horas**

---

## 🚨 NOTAS IMPORTANTES

### ⚠️ Antes de empezar:
1. **Hacer backup de la base de datos**
   ```bash
   php artisan db:backup # (si tienes configurado)
   # O exportar manualmente desde phpMyAdmin
   ```

2. **Crear rama de Git para los cambios**
   ```bash
   git checkout -b feature/fix-permissions-system
   ```

3. **Verificar que estás en entorno de desarrollo**
   - No hacer estos cambios directamente en producción

### ⚠️ Durante la ejecución:
1. **Hacer commit después de cada fase completada**
2. **Probar inmediatamente después de cada cambio**
3. **Documentar cualquier problema encontrado**

### ⚠️ Antes de mergear:
1. **Ejecutar todos los tests**
2. **Verificación completa (FASE 8)**
3. **Code review (si trabajas en equipo)**
4. **Actualizar changelog**

---

## ✅ CRITERIOS DE ACEPTACIÓN

El sistema de permisos estará completo cuando:

- [ ] ✅ Todas las rutas están protegidas con middleware de permisos
- [ ] ✅ El menú solo muestra opciones permitidas para cada rol
- [ ] ✅ Los controladores tienen autorización en métodos críticos
- [ ] ✅ Todos los roles tienen permisos coherentes (ver + gestionar)
- [ ] ✅ Los nombres de roles son consistentes
- [ ] ✅ Todos los tests pasan
- [ ] ✅ No hay errores en logs
- [ ] ✅ La experiencia de usuario es clara y sin confusiones
- [ ] ✅ Existe documentación actualizada
- [ ] ✅ El código está en control de versiones

---

## 📞 RECURSOS Y AYUDA

**Comandos útiles:**
```bash
# Limpiar cache de permisos
php artisan permission:cache-reset

# Ver permisos de un rol
php artisan tinker
>>> Role::where('name', 'Vendedor')->first()->permissions;

# Ver roles de un usuario
>>> User::find(1)->getRoleNames();

# Ejecutar tests
php artisan test --filter=Permission

# Crear respaldo de BD
mysqldump -u root -p viision_db > backup_$(date +%Y%m%d).sql
```

**Documentación:**
- [Spatie Permission](https://spatie.be/docs/laravel-permission/v5/introduction)
- [Laravel Authorization](https://laravel.com/docs/10.x/authorization)

---

**Creado:** 25 de Diciembre, 2025  
**Última actualización:** 25 de Diciembre, 2025  
**Versión:** 1.0
