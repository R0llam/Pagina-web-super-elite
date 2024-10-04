Paginador = function(divPaginador, tabla)
{
    this.miDiv = divPaginador;
    this.tabla = tabla;       
    this.tamPagina = 5;
    this.pagActual = 1;
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina);

    this.SetPagina = function(num)
    {
        if (num < 0 || num > this.paginas)
            return;

        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;

        for(var i = 2; i < this.tabla.rows.length; i++)
        {
            if (i < min || i > max)
                this.tabla.rows[i].style.display = 'none';
            else
                this.tabla.rows[i].style.display = '';
        }
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
    }

    this.Mostrar = function()
    {
        var tblPaginador = document.createElement('table');

        var fil = tblPaginador.insertRow(tblPaginador.rows.length);

        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn btn btn-outline-primary';
        var self = this;
        ant.onclick = function()
        {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }

        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = '';
        num.className = 'numero_page btn btn-outline-secondary';

        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn btn btn-outline-primary';
        sig.onclick = function()
        {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }

        this.miDiv.appendChild(tblPaginador);

    
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina)
            this.paginas = this.paginas + 1;

        this.SetPagina(this.pagActual);
    }
}

var p = new Paginador(
    document.getElementById('paginador_2'),
    document.getElementById('tblDatos_2'),
    4
);
p.Mostrar();