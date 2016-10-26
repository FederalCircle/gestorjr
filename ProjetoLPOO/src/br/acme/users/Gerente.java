package br.acme.users;
import br.acme.storage.*;


public class Gerente extends Usuario {
	// Atributos ----------------------------------------------------------------------------------------------------
		private RepositorioMotorista repMotor;
	
	// Construtor ----------------------------------------------------------------------------------------------------
	public Gerente(String cpf, String nome, String senha, String email, String sexo,RepositorioMotorista repmotor){
		// Construtor da superClasse
		super(cpf,nome,senha,email,sexo);
		this.repMotor = repmotor;
	}

	// Getters and Setters ----------------------------------------------------------------------------------------------------
		// Getters and Setters estão na superClasse

	// Métodos ----------------------------------------------------------------------------------------------------
	public void cadastrarMotorista(Motorista newbie){
		repMotor.adicionar(newbie);
		
	}
	
	public void removerMotorista(long id){
		repMotor.remover(id);
	}
	
	public void listarMotoristas(){
		System.out.println("Nome\tEmail");
		for(Motorista motor : repMotor.buscarTodos()){
			if(motor==null) break;
			System.out.println(motor.getNome()+"\t"+motor.getEmail());
		}
		System.out.println();
	}
	
	public void listarClientes(RepositorioSolicitante lista ){
		System.out.println("Nome\tEmail");
		for(Solicitante solicitante : lista.buscarTodos()){
			if(solicitante==null) break;
			System.out.println(solicitante.getNome()+"\t"+solicitante.getEmail());
		}
		System.out.println();
	}
	public String toString(){
		return super.toString();
	}
	
}
