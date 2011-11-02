require 'spec_helper'

describe SeedsController do

  describe "GET 'getSeeds'" do
    it "should be successful" do
      get 'getSeeds'
      response.should be_success
    end
  end

  describe "GET 'addSeed'" do
    it "should be successful" do
      get 'addSeed'
      response.should be_success
    end
  end

  describe "GET 'removeSeed'" do
    it "should be successful" do
      get 'removeSeed'
      response.should be_success
    end
  end

end
