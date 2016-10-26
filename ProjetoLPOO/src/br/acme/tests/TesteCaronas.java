package br.acme.tests;

import java.util.Date;

import br.acme.location.*;
import br.acme.storage.*;
import br.acme.users.*;

public class TesteCaronas {
	
	public static void main(String[] args) {
		Date dataNascimento = new Date();// necessário para Solicitante
		
/*Solicitantes, Motoristas e Viagens são necessários para Viagem*/
		// Criando o repositório ----------------------------------------------------------------------------------------------------
		RepositorioSolicitante repSolicitante = new RepositorioSolicitante();
		RepositorioViagem repviagem = new RepositorioViagem();
		RepositorioMotorista repMotor = new RepositorioMotorista();
		
		// Criando os solicitantes
		Gerente gerente = new Gerente("888.888.888-88","gerente","gerente123","gerente@gerente.com","Masculino",repMotor);
		Solicitante solPaula = new Solicitante("111.111.111-11", "paula@travel.com", "paula123", "Paula", "Feminino", dataNascimento, 99112233);
		Solicitante solPedro = new Solicitante("222.222.222-22", "pedro@travel.com", "pedro123", "Pedro", "Masculino", dataNascimento, 99887755);
		Solicitante solAndre = new Solicitante("333.333.333-33", "andre@travel.com", "andre123", "André", "Masculino", dataNascimento, 99332211);
		
		// Criando os motoristas
		Motorista motJose = new Motorista("333.333.333-33", "Jose", "jose123", "jose@motor.com", "Masculino", true);
		Motorista motAna = new Motorista("444.444.444-44", "Ana", "ana123", "ana@motor.com", "Feminino", true);
		Motorista motMaria = new Motorista("555.555.555-55", "Maria", "maria123", "maria@motor.com", "Feminino", true);
		
		gerente.cadastrarMotorista(motMaria);
		gerente.cadastrarMotorista(motAna);
		gerente.cadastrarMotorista(motJose);
		
		repSolicitante.adicionar(solPaula);
		repSolicitante.adicionar(solPedro);
		repSolicitante.adicionar(solAndre);
		//Criando os lugares
		
		Lugar inicio = new Lugar("Praça", "Rua Alpha, 256");
		Lugar fim = new Lugar("Mercado", "Rua Omega, 652");
		
		// Criando os Viagems ----------------------------------------------------------------------------------------------------

		Viagem  travel1 = new Viagem(solPaula, motAna, inicio, fim, 50, "Cartão");
		Viagem  travel2 = new Viagem( solPedro, motJose, inicio, fim, 55, "à Vista");
		Viagem  travel3 = new Viagem( solAndre, motMaria, inicio, fim, 60, "Cheque");
		
		// Adicionando os Viagems ao repositorio ----------------------------------------------------------------------------------------------------
		repviagem.adicionar(travel1);
		repviagem.adicionar(travel2);
		repviagem.adicionar(travel3);
		
		gerente.listarMotoristas();		
		System.out.println();
		gerente.listarClientes(repSolicitante);
		
		solPaula.solicitarCarona(repMotor);
		solPedro.solicitarCarona(repMotor);
		solAndre.solicitarCarona(repMotor);
	}
}
