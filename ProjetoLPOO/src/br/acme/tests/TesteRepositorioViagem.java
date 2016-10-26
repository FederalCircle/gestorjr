package br.acme.tests;

import java.util.Date;

import br.acme.storage.RepositorioViagem;
import br.acme.users.Motorista;
import br.acme.users.Solicitante;
import br.acme.location.Lugar;
import br.acme.location.Viagem;

public class TesteRepositorioViagem {

	public static void main(String[] args) {
		Date dataNascimento = new Date();// necessário para Solicitante
		
/*Solicitantes, Motoristas e Viagens são necessários para Viagem*/
		// Criando os solicitantes
		Solicitante solPaula = new Solicitante("111.111.111-11", "paula@travel.com", "paula123", "Paula", "Feminino", dataNascimento, 99112233);
		Solicitante solPedro = new Solicitante("222.222.222-22", "pedro@travel.com", "pedro123", "Pedro", "Masculino", dataNascimento, 99887755);
		Solicitante solAndre = new Solicitante("333.333.333-33", "andre@travel.com", "andre123", "André", "Masculino", dataNascimento, 99332211);
		
		// Criando os motoristas
		Motorista motJose = new Motorista("333.333.333-33", "Jose", "jose123", "jose@motor.com", "Masculino", true);
		Motorista motAna = new Motorista("444.444.444-44", "Ana", "ana123", "ana@motor.com", "Feminino", true);
		Motorista motMaria = new Motorista("555.555.555-55", "Maria", "maria123", "maria@motor.com", "Feminino", true);
		
		//Criando os lugares
		Lugar inicio = new Lugar("Praça", "Rua Alpha, 256");
		Lugar fim = new Lugar("Mercado", "Rua Omega, 652");
		
		// Criando os Viagems ----------------------------------------------------------------------------------------------------

		Viagem  travel1 = new Viagem(solPaula, motAna, inicio, fim, 50, "Cartão");
		Viagem  travel2 = new Viagem( solPedro, motJose, inicio, fim, 55, "à Vista");
		Viagem  travel3 = new Viagem( solAndre, motMaria, inicio, fim, 60, "Cheque");
		
		// Criando o repositório ----------------------------------------------------------------------------------------------------
		RepositorioViagem repositorio = new RepositorioViagem();
		
		// Adicionando os Viagems ao repositorio ----------------------------------------------------------------------------------------------------
		repositorio.adicionar(travel1);
		repositorio.adicionar(travel2);
		repositorio.adicionar(travel3);
		
		System.out.println("ID\t\tOrigem\t\tDestino");
		for(Viagem travel: repositorio.getListaViagem()){
			if(travel==null)break;
			System.out.println("#"+travel.getId()+"\t\t"+travel.getOrigem().getEndereco()+"\t\t"+travel.getDestino().getEndereco());
		}
		System.out.println();
		
		// Removendo os Viagems do repositorio ----------------------------------------------------------------------------------------------------
		repositorio.remover(2); // Viagem existe
		repositorio.remover(5); // Viagem não existe
		
		System.out.println("ID\t\tOrigem\t\tDestino");
		for(Viagem travel: repositorio.getListaViagem()){
			if(travel==null)break;
			System.out.println("#"+travel.getId()+"\t\t"+travel.getOrigem().getEndereco()+"\t\t"+travel.getDestino().getEndereco());
		}
		System.out.println();
		
		// Buscando um Viagem ----------------------------------------------------------------------------------------------------
		System.out.println("O Viagem #3 foi de ("+repositorio.buscar(3).getOrigem().getEndereco()+") até ("+repositorio.buscar(3).getDestino().getEndereco()+")\n");
		
		// Retornando a lista de Viagems ----------------------------------------------------------------------------------------------------
		Viagem[] lista = repositorio.buscarTodos();
		
		System.out.println("ID\t\tOrigem\t\tDestino");
		for(Viagem travel: lista){
			if(travel==null)break;
			System.out.println("#"+travel.getId()+"\t\t"+travel.getOrigem().getEndereco()+"\t\t"+travel.getDestino().getEndereco());
		}
		System.out.println();
		System.out.println(travel1.toString());


	}

}
