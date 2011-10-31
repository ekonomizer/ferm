class SeedsController < ApplicationController

	def getSeeds
		@seeds = Seed.all
		
		if @seeds.length != 0
			render :content_type => 'application/xml', :layout => false
		else
			render :content_type => 'application/xml', :layout => false, :action => 'noObjects'
		end
	end

	def addSeed
		seed = Seed.new( objectName:params[:objectName], x:params[:x], y:params[:y], plantedTime:params[:plantedTime])
		seed.save
	end

	def removeSeed
		seed = Seed.find_by_plantedTime(params[:plantedTime])
		seed.destroy
	end
	
	def noObjects
	end
end
