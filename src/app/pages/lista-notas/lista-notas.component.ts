import { Component, OnInit } from '@angular/core';
import { Nota } from 'src/app/nota';
import { ServicioNotaService } from 'src/app/servicio-nota.service';

@Component({
  selector: 'app-lista-notas',
  templateUrl: './lista-notas.component.html',
  styleUrls: ['./lista-notas.component.scss']
})
export class ListaNotasComponent implements OnInit {
  listaInicio:Array<Nota> = [];
  listaProceso:Array<Nota> = [];
  listaTerminado:Array<Nota> = [];
  nota: Nota | undefined;
  
  constructor(private servicio:ServicioNotaService) {

  }

  ngOnInit(): void {
    this.servicio.verNotas().subscribe(datos=>{
      this.listaInicio=datos[0];
      this.listaProceso=datos[1];
      this.listaTerminado=datos[2];
    });
  }

  verNotas(){
    this.servicio.verNotas().subscribe(datos=>{
      this.listaInicio=datos[0];
      this.listaProceso=datos[1];
      this.listaTerminado=datos[2];
    });
  }

  editar(){
    let lista:Array<Nota>=[{
      titulo:this.form.get("titulo")?.value,
      estado:this.form.get("estado")?.value,
      descripcion:this.form.get("descripcion")?.value
      }
    ];

    this.servicio.guardar(lista).subscribe(datos=>{

    });
  }
  adicionar(){
    this.titulo.setValue("");
    this.descripcion.setValue("");
    this.estado.setValue("Selected");
  }

  eliminar(){

  }
}
