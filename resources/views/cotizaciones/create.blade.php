@extends('layouts.app')

@section('title', 'Cotización - ModaExpress')
@section('page-title', 'Terminal de Ventas')

@section('content')
<div class="mb-3" style="background: var(--light-blue); color: white; padding: 15px; border-radius: 8px;">
    <strong>COTIZACIÓN | {{ strtoupper(now()->format('l d \d\e F \d\e Y')) }}</strong>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <button class="btn btn-primary btn-modern w-100">Cotización</button>
    </div>
    <div class="col-md-6">
        <button class="btn btn-outline-primary btn-modern w-100">Listado</button>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="filter-card">
            <h5 class="mb-4">Datos de Cotización</h5>
            <form>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Código</label>
                        <input type="text" class="form-control" placeholder="#COD CLIENTE">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">DNI</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="#DNI">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-person"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Vendedor</label>
                        <select class="form-select">
                            <option>Seleccionar vendedor...</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="#NOMBRE">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" placeholder="#APELLIDO">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" placeholder="#CORREO">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" placeholder="#TELÉFONO">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Moneda</label>
                        <select class="form-select">
                            <option>DÓLAR AMERICANO</option>
                            <option>SOL PERUANO</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Condiciones de Pago</label>
                        <select class="form-select">
                            <option>Contado</option>
                            <option>Crédito</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Validez</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="7">
                            <span class="input-group-text">DÍAS</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Req. / Ref.</label>
                        <input type="text" class="form-control" placeholder="Referencia">
                    </div>
                </div>
                <button type="button" class="btn btn-warning btn-modern">
                    <i class="bi bi-plus-circle"></i> + Producto
                </button>
            </form>
        </div>

        <div class="filter-card mt-4">
            <h5 class="mb-4">Lista de Artículos</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Cant.</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Oper.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="10" class="text-center py-4 text-muted">No hay artículos agregados</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-warning btn-modern">
                    <i class="bi bi-plus-circle"></i> + Producto
                </button>
                <button class="btn btn-success btn-modern">
                    <i class="bi bi-check-circle"></i> Guardar
                </button>
                <button class="btn btn-danger btn-modern">
                    <i class="bi bi-x-circle"></i> X Cancelar
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="filter-card mb-3">
            <h6>Sesión: 1 - Cotización #209</h6>
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span>Cant. de Artículos:</span>
                <strong>0</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Sub-Total:</span>
                <strong>0</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Impuesto:</span>
                <strong>0</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Total (Con Impuesto):</span>
                <strong>0</strong>
            </div>
        </div>

        <div class="filter-card">
            <h6>Atajos:</h6>
            <hr>
            <div class="mb-2"><strong>F2</strong> ver stock</div>
            <div class="mb-2"><strong>F4</strong> ver precios</div>
            <div class="mb-2"><strong>F6</strong> últimos precios</div>
        </div>
    </div>
</div>
@endsection

