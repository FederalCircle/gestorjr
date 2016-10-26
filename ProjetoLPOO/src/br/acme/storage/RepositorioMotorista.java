package br.acme.storage;
import br.acme.users.Motorista;

public class RepositorioMotorista {
	// Atributos ----------------------------------------------------------------------------------------------------
	private Motorista[] listaMotorista = new Motorista[10];
	
	// Construtor Padrão
	
	// Getters and Setters ----------------------------------------------------------------------------------------------------
	public Motorista[] getListaMotorista() {
		return listaMotorista;
	}

	public void setListaMotorista(Motorista[] listaMotorista) {
		this.listaMotorista = listaMotorista;
	}
	
	// Métodos ----------------------------------------------------------------------------------------------------
	public void adicionar(Motorista novoMotorista){
		/* 
		 * Para cada elemento não nulo do Array:
		 * 	 > Compara o ID do atual com o ID do novo:
		 * 		> Se o ID for igual, quebra o laço;
		 * 		> Se for diferente, segue para o próximo elementoe e aumenta o índice;
		 * Caso encontre um elemento nulo, insere o novo elemento neste espaçoe quebra o laço;
		 */
		int i=0;// Índice do elemento no Array
		for(Motorista elemento: listaMotorista){
			if(elemento!=null){
				if(elemento.getId()==novoMotorista.getId())
					break;
				else
					i++;
			}
			else{
				listaMotorista[i]=novoMotorista;
				break;
			}
		}
	}
	
	public void remover(long id){
		/*
		 * Caso qualquer elemento nulo seja encontrado, o laço é encerrado;
		 * Se o elemento com o ID especificado seja encontrado a posição dele é igualada à null;
		 * Caso o elemento tenha sido removido do vetor:
		 * 	 > Se o índice for a última posição, o espaço se torna null;
		 *   > Se não, o espaço atual é igualado ao próximo;
		 */
		boolean removido = false; // Varia de acordo com o sucesso do método
		int i=0;
		for(Motorista elemento: listaMotorista){
			if(elemento==null)break;
			if(elemento.getId() == id){
				elemento=null;
				removido=true;
			}
			if(removido){
				// Se índice for a última posição do vetor, é igualada à null, se não, ao próximo elemento
				listaMotorista[i]=(i==listaMotorista.length-1)?null:listaMotorista[i+1];
			}
			i++;
		}
		if(removido){
			System.out.println("Motorista removido com sucesso.");
		}
		else
			System.out.println("Motorista não encontrado.");
	}
	
	public void alterar(long id, Motorista novoMotorista){
		boolean alterado = false; // Varia de acordo com o sucesso do método
		int i=0;
		for(Motorista elemento: listaMotorista){
			if(elemento==null)break;
			if(elemento.getId() == id){
				listaMotorista[i]=novoMotorista;
				alterado=true;
			}
			i++;
		}
		if(alterado)
			System.out.println("Motorista alterado com sucesso.");
		else
			System.out.println("Motorista não encontrado.");
	}
	
	public Motorista buscar(long id){
		for(Motorista motorista : listaMotorista){
			if(motorista==null)break;
			if(motorista.getId() == id){
				return motorista;
			}
		}
		return null;
	}
	
	public Motorista[] buscarTodos(){
		return this.getListaMotorista();
	}
}
