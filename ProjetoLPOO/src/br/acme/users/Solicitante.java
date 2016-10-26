package br.acme.users;
import java.util.Date;

import br.acme.location.*;
import br.acme.storage.*;
public class Solicitante extends Usuario {
	// Atributos ----------------------------------------------------------------------------------------------------
	private Date dataNascimento = new Date();
	private int numeroCelular;
	private Lugar[] lugares = new Lugar[10];
	private Viagem[] viagens = new Viagem[10];
	
	// Construtor ----------------------------------------------------------------------------------------------------
	public Solicitante(String cpf, String email, String senha, String nome, String sexo, Date dataNascimento, int numeroCelular) {
		// Construtor da superClasse
		super(cpf,nome,senha,email,sexo);
		this.dataNascimento = dataNascimento;
		this.numeroCelular = numeroCelular;
	}

	// Getters and Setters ----------------------------------------------------------------------------------------------------

	public Date getDataNascimento() {
		return dataNascimento;
	}

	public void setDataNascimento(Date dataNascimento) {
		this.dataNascimento = dataNascimento;
	}

	public int getNumeroCelular() {
		return numeroCelular;
	}

	public void setNumeroCelular(int numeroCelular) {
		this.numeroCelular = numeroCelular;
	}

	public Lugar[] getLugares() {
		return lugares;
	}

	public void setLugares(Lugar[] lugares) {
		this.lugares = lugares;
	}

	public Viagem[] getViagens() {
		return viagens;
	}

	public void setViagens(Viagem[] viagens) {
		this.viagens = viagens;
	}	
	
	// Métodos ----------------------------------------------------------------------------------------------------
	public void solicitarCarona(RepositorioMotorista repositorio){
		for(Motorista motor : repositorio.buscarTodos()){
			if(motor.getDisponivel()== true){ 
				motor.responderPedido();
				break;		
			}
		}
		
	}
	
	public void cancelarCarona(){
		
	}
	
	public void historico(){
		
	}
	public String toString(){
		return super.toString()+"Data de Nascimento: "+this.dataNascimento+";Numero Celular: "+this.numeroCelular;
	}
}
